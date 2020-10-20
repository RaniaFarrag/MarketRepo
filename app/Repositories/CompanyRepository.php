<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyDesignatedContact;
use App\Models\CompanyMeeting;
use App\Models\Country;
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class CompanyRepository implements CompanyRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $country_model;
    protected $city_model;
    protected $sector_model;
    protected $sub_sector_model;
    protected $company_model;
    protected $company_designated_contact_model;
    protected $company_meeting_model;
    protected $user_model;


    public function __construct(Country $country, City $city, Sector $sector, SubSector $subSector, Company $company
        , CompanyDesignatedContact $companyDesignatedContact, CompanyMeeting $companyMeeting, User $user)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
        $this->company_model = $company;
        $this->company_designated_contact_model = $companyDesignatedContact;
        $this->company_meeting_model = $companyMeeting;
        $this->user_model = $user;

    }

    public function create()
    {
        $data = array();
        $data['countries'] = $this->country_model::all();
        $data['cities'] = $this->city_model::all();;
        $data['sectors'] = $this->sector_model::all();;
        $data['sub_sectors'] = $this->sub_sector_model::all();

        return $data;

    }

    /** View All companies */
    public function index($request, $all = null)
    {
        //dd($request->all());
        if (Auth::user()->hasRole('Representative')) {
            $query = $this->company_model->where('representative_id', Auth::user()->id)->with('subSector')
                ->orderBy('created_at', 'desc');
        }
        elseif (Auth::user()->hasRole('Sales Manager')) {
            $query = $this->company_model->WhereIn('sector_id', Auth::user()->sectors->pluck('id'))
                ->with('subSector')
                ->orderBy('created_at', 'desc');
        }
        else {
            $query = $this->company_model
                ->with('subSector')
                ->orderBy('created_at', 'desc');
        }
        if ($request->created_at) {
            $date = Carbon::parse($request->created_at);
            $query->whereDate('created_at', $date);
        }

        if ($request->interview_date) {
            $date = Carbon::parse($request->interview_date);
            $query->whereHas('companyMeetings', function ($q) use ($date) {
                $q->whereDate('date', $date);
            });
        }

        if ($request->location == 1)
            $query->whereNotNull('location');

        if ($request->location == 2)
            $query->whereNull('location');

        if ($request->client_status)
            $query->where('client_status', $request->client_status);

        if ($request->representative_id)
            $query->where('representative_id', $request->representative_id);

        if ($request->representative == 1)
            $query->whereNotNull('representative_id');

        if ($request->representative == 2)
            $query->whereNull('representative_id');
//            $query->whereNull('representative_id');

        if (isset($request->company_status) && count($request->company_status) > 0)
            foreach ($request->company_status as $val)
                if ($val != 'no_meeting')
                    $query->where($val, 1);
                else {
                    $query->where('confirm_connected', null);
                    $query->where('confirm_interview', null);
                    $query->where('confirm_need', null);
                    $query->where('confirm_contract', null);
                }

        if (isset($request->communication_type) && count($request->communication_type) > 0)
            foreach ($request->communication_type as $val)
                $query->whereNotNull($val);

        if (isset($request->evaluation_ids))
            $query->whereIn('evaluation_status', $request->evaluation_ids);

        if ($request->city_id)
            $query->where('city_id', $request->city_id);

        if ($request->country_id)
            $query->where('country_id', $request->country_id);

        if ($request->sector_id)
            $query->where('sector_id', $request->sector_id);

        if ($request->subSector_id)
            $query->where('sub_sector_id', $request->subSector_id);

        if ($request->name)
            $query->whereTranslationLike('name', '%' . $request->name . '%');
        if ($all)
          return  $query->get();
        else
        {
            $data = array();
            $data['count'] = $query->count();
            $data['companies'] = $query->paginate(18);
            return  $data;
        }

        //dd($data['companies']);
//        return $all ? $query->get() : $query->paginate(18);
    }

    /** Store Company */
    public function store($request)
    {
        //dd($request->client_status);
        //dd(count($request->designated_contact_name));
//        dd(Storage::disk('local')->path('/'));
//        dd(storage_path('app') .'/'. $logo);

        if (Auth::user()->parent_id) {
            $representative_id = Auth::user()->id;
            if (!Auth::user()->sectors()->find($request->sector_id)) {
                Auth::user()->sectors()->attach($request->sector_id);
            }
        } else {
            $representative_id = null;
        }

        $logo = $this->verifyAndStoreFile($request, 'logo');
        $first_business_card = $this->verifyAndStoreFile($request, 'first_business_card');
        $second_business_card = $this->verifyAndStoreFile($request, 'second_business_card');
        $third_business_card = $this->verifyAndStoreFile($request, 'third_business_card');

        $company = $this->company_model::create([
            'logo' => $logo,
            'first_business_card' => $first_business_card,
            'second_business_card' => $second_business_card,
            'third_business_card' => $third_business_card,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'whatsapp' => $request->whatsapp,
            'phone' => $request->phone,
            'sector_id' => $request->sector_id,
            'sub_sector_id' => $request->sub_sector_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'district' => $request->district,
            'location' => $request->location,
            'branch_number' => $request->branch_number,
            'num_of_employees' => $request->num_of_employees,
            'website' => $request->website,
            'email' => $request->email,
            'website' => $request->website,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'company_representative_name' => $request->company_representative_name,
            'company_representative_job_title' => $request->company_representative_job_title,
            'company_representative_job_mobile' => $request->company_representative_job_mobile,
            'company_representative_job_phone' => $request->company_representative_job_phone,
            'company_representative_job_email' => $request->company_representative_job_email,
            'hr_director_job_name' => $request->hr_director_job_name,
            'hr_director_job_email' => $request->hr_director_job_email,
            'hr_director_job_mobile' => $request->hr_director_job_mobile,
            'hr_director_job_phone' => $request->hr_director_job_phone,
            'hr_director_job_whatsapp' => $request->hr_director_job_whatsapp,

            'contract_manager_name' => $request->contract_manager_name,
            'contract_manager_email' => $request->contract_manager_email,
            'contract_manager_mobile' => $request->contract_manager_mobile,
            'contract_manager_phone' => $request->contract_manager_phone,
            'contract_manager_whatsapp' => $request->contract_manager_whatsapp,

            'user_id' => auth()->id(),

            'client_status' => $request->client_status,
            'client_status_user_id' => auth()->id(),
            'evaluation_status' => $request->evaluation_status,
            'evaluation_status_user_id' => auth()->id(),
            'notes' => $request->notes,
            'representative_id' => $representative_id,
        ]);


        for ($i = 0; $i < count($request->designated_contact_name); $i++) {
            if ($request->designated_contact_name[$i] != null) {
                $company_designated_contact = $this->company_designated_contact_model::create([
                    'name' => $request->designated_contact_name[$i],
                    'job_title' => $request->designated_contact_job_title[$i],
                    'mobile' => $request->designated_contact_mobile[$i],
                    'citizenship' => $request->designated_contact_citizenship[$i],
                    'linkedin' => $request->designated_contact_linkedin[$i],
                    'whatsapp' => $request->designated_contact_whatsapp[$i],
                    'email' => $request->designated_contact_email[$i],
                    'company_id' => $company->id,
                ]);
            }
            //dd($request->designated_contact_name[$i]);
        }

        foreach ($request->item as $item) {
            //dd($item['time']);
//            $changedDate = Carbon::createFromFormat('dd/mm/YYYY', $item['date'])->format('YYYY-mm-dd');
//            $res = explode("/", $item['date']);
//           $changedDate = $res[2]."-".$res[0]."-".$res[1];
//            $res = explode(" ", $item['time']);
//            $changed_time = $res[0];
//            $date = DateTime::createFromFormat("m/d/Y" , $item['date']);
//            $changed_date =  $date->format('Y-m-d');

            if ($item['date']) {
                $company_meeting = $this->company_meeting_model::create([
                    'date' => $item['date'],
                    'time' => $item['time'],
                    'company_id' => $company->id,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        $this->addLog(auth()->id(), $company->id, 'companies', 'تم اضافة شركة جديدة', 'New Company has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companies.index'));
    }


    /** Show One Company */
    public function show($company)
    {
        return $this->companyRepositoryinterface->show($company);
    }

    /** Edit Company */
    public function edit($company)
    {
//        dd(count($company->company_designated_contacts));
        $data = array();
        $data['countries'] = $this->country_model::all();
        $data['cities'] = $this->city_model::all();;
        $data['sectors'] = $this->sector_model::all();;
        $data['sub_sectors'] = $this->sub_sector_model::all();

        return $data;

    }

    /** Submit Edit company */
    public function update($request, $company)
    {

        //dd(count($request->designated_contact_name));
//        dd($request->item);
        if ($request->hasFile('logo')) {
            $logo = $this->verifyAndStoreFile($request, 'logo');
        } else {
            $logo = $company->logo;
        }

        if ($request->hasFile('first_business_card')) {
            $first_business_card = $this->verifyAndStoreFile($request, 'first_business_card');
        } else {
            $first_business_card = $company->first_business_card;
        }


        if ($request->hasFile('second_business_card')) {
            $second_business_card = $this->verifyAndStoreFile($request, 'second_business_card');
        } else {
            $second_business_card = $company->second_business_card;
        }


        if ($request->hasFile('third_business_card')) {
            $third_business_card = $this->verifyAndStoreFile($request, 'third_business_card');
        } else {
            $third_business_card = $company->third_business_card;
        }


        $company->update([
            'logo' => $logo,
            'first_business_card' => $first_business_card,
            'second_business_card' => $second_business_card,
            'third_business_card' => $third_business_card,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'whatsapp' => $request->whatsapp,
            'phone' => $request->phone,
            'sector_id' => $request->sector_id,
            'sub_sector_id' => $request->sub_sector_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'district' => $request->district,
            'location' => $request->location,
            'branch_number' => $request->branch_number,
            'num_of_employees' => $request->num_of_employees,
            'website' => $request->website,
            'email' => $request->email,
            'website' => $request->website,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'company_representative_name' => $request->company_representative_name,
            'company_representative_job_title' => $request->company_representative_job_title,
            'company_representative_job_mobile' => $request->company_representative_job_mobile,
            'company_representative_job_phone' => $request->company_representative_job_phone,
            'company_representative_job_email' => $request->company_representative_job_email,
            'hr_director_job_name' => $request->hr_director_job_name,
            'hr_director_job_email' => $request->hr_director_job_email,
            'hr_director_job_mobile' => $request->hr_director_job_mobile,
            'hr_director_job_phone' => $request->hr_director_job_phone,
            'hr_director_job_whatsapp' => $request->hr_director_job_whatsapp,

            'contract_manager_name' => $request->contract_manager_name,
            'contract_manager_email' => $request->contract_manager_email,
            'contract_manager_mobile' => $request->contract_manager_mobile,
            'contract_manager_phone' => $request->contract_manager_phone,
            'contract_manager_whatsapp' => $request->contract_manager_whatsapp,

            'user_id' => auth()->id(),

            'client_status' => $request->client_status,
            'client_status_user_id' => auth()->id(),
            'evaluation_status' => $request->evaluation_status,
            'evaluation_status_user_id' => auth()->id(),
            'notes' => $request->notes,
        ]);

        //dd(count($company->companyDesignatedcontacts));

        for ($i = 0; $i < count($request->designated_contact_name); $i++) {
            if (isset($company->companyDesignatedcontacts[$i])) {
//                if($request->designated_contact_name[$i] != null){
                $company->companyDesignatedcontacts[$i]->update([
                    'name' => $request->designated_contact_name[$i],
                    'job_title' => $request->designated_contact_job_title[$i],
                    'mobile' => $request->designated_contact_mobile[$i],
                    'citizenship' => $request->designated_contact_citizenship[$i],
                    'linkedin' => $request->designated_contact_linkedin[$i],
                    'whatsapp' => $request->designated_contact_whatsapp[$i],
                    'email' => $request->designated_contact_email[$i],
                    'company_id' => $company->id,
                ]);
//                }

            } else {
                if ($request->designated_contact_name[$i] != null) {
                    $this->company_designated_contact_model::create([
                        'name' => $request->designated_contact_name[$i],
                        'job_title' => $request->designated_contact_job_title[$i],
                        'mobile' => $request->designated_contact_mobile[$i],
                        'citizenship' => $request->designated_contact_citizenship[$i],
                        'linkedin' => $request->designated_contact_linkedin[$i],
                        'whatsapp' => $request->designated_contact_whatsapp[$i],
                        'email' => $request->designated_contact_email[$i],
                        'company_id' => $company->id,
                    ]);
                }
            }
        }

        foreach ($request->item as $k => $item) {
            if (isset($company->companyMeetings[$k])) {
                $company->companyMeetings[$k]->update([
                    'date' => $item['date'],
                    'time' => $item['time'],
                    'company_id' => $company->id,
                    'user_id' => auth()->id(),
                ]);
            } else {
                if ($item['date']) {
                    $company_meeting = $this->company_meeting_model::create([
                        'date' => $item['date'],
                        'time' => $item['time'],
                        'company_id' => $company->id,
                        'user_id' => auth()->id(),
                    ]);
                }
            }

        }

        $this->addLog(auth()->id(), $company->id, 'companies', 'تم تعديل شركة ', 'Company has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companies.index'));

    }

    /** Delete Company */
    public function destroy($company)
    {
//        dd($company->companyDesignatedcontacts);
        foreach ($company->companyDesignatedcontacts as $companyDesignatedcontact) {
            $companyDesignatedcontact->delete();
        }

        foreach ($company->companyMeetings as $companyMeeting) {
            $companyMeeting->delete();
        }
        $company->delete();

        $this->addLog(auth()->id(), $company->id, 'companies', 'تم حذف شركة', 'Company has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companies.index'));
    }

    /** Confirm Connected */
    public function confirmConnected($company_id)
    {
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_connected == 0) {
            $company->update([
                'confirm_connected' => 1,
                'confirm_connected_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد اتصال الشركة   ', 'Company contact confirmed');
            return trans('dashboard.Company contact confirmed');
        } elseif ($company->confirm_connected == 1) {
            $company->update([
                'confirm_connected' => 0,
                'confirm_connected_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء تأكيد اتصال الشركة  ', 'The Company contact confirmation has been canceled');
            return trans('dashboard.The Company contact confirmation has been canceled');
        }

    }

//    /** Cancel Confirm Connected */
//    public function cancelConfirmConnected($company_id){
//        $company = $this->company_model::findOrFail($company_id);
//        $company->update([
//            'confirm_connected' => 0,
//            'confirm_connected_user_id' => auth()->id(),
//        ]);
//
//        $this->addLog(auth()->id() , $company->id , 'companies' , 'تم إلغاء تأكيد اتصال الشركة  ' , 'The Company contact confirmation has been canceled');
//        return trans('dashboard.Confirmed Connected');
//    }

    /** Confirm Interview */
    public function confirmInterview($company_id)
    {
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_interview == 0) {
            if (count($company->companyMeetings)) {
                $company->update([
                    'confirm_interview' => 1,
                    'confirm_interview_user_id' => auth()->id(),
                ]);
                $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد مقابلة الشركة', 'The company interview was confirmed');
                return trans('dashboard.The company interview was confirmed');
            }
            return trans('dashboard.No interview has been added');
        } elseif ($company->confirm_interview == 1) {
            $company->update([
                'confirm_interview' => 0,
                'confirm_interview_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء  مقابلة الشركة', 'Company interview canceled');
            return trans('dashboard.Company interview canceled');
        }

    }

    /** Confirm Need */
    public function confirmNeed($company_id)
    {
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_need == 0) {
            if (count($company->companyNeeds)) {
                $company->update([
                    'confirm_need' => 1,
                    'confirm_need_user_id' => auth()->id(),
                ]);
                $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد احتياج الشركة ', 'The company need was confirmed');
                return trans('dashboard.The company needs was confirmed');
            }
            return trans('dashboard.No Needs has been added');
        } elseif ($company->confirm_need == 1) {
            $company->update([
                'confirm_need' => 0,
                'confirm_need_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء احتياج الشركة', 'Company need canceled');
            return trans('dashboard.Company need canceled');
        }
    }

    /** Confirm Contract */
    public function confirmContract($company_id)
    {
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_contract == 0) {
            $company->update([
                'confirm_contract' => 1,
                'confirm_contract_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد التعاقد مع الشركة ', 'The contract has been confirmed with the company');
            return trans('dashboard.The contract has been confirmed with the company');
        } elseif ($company->confirm_contract == 1) {
            $company->update([
                'confirm_contract' => 0,
                'confirm_contract_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء التعاقد مع الشركة  ', 'The contract with the company has been canceled');
            return trans('dashboard.The contract with the company has been canceled');
        }
    }


    /** companies Reports */
    public function companiesReports($request,$all=false)
    {
        $data['companies'] = $this->index($request, $all);
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();
        $data['representatives'] = $this->user_model::where('parent_id', Auth::user()->id)->get();
        return $data;
    }

    /** Send Email To Company */
    public function sendEmail($request)
    {
        //dd($request->message);
        Mail::send([], [], function ($message) use ($request) {
            $message->to('eng19956@gmail.com');
            $message->subject('Mail Sysytem');
            $message->setBody($request->message);
        });

        Alert::success('success', trans('dashboard. sent successfully'));
        return redirect(route('companies.index'));
    }

}
