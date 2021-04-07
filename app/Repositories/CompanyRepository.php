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
use App\Models\CompanyUser;
use App\Models\Country;
use App\Models\MotherCompany;
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use function GuzzleHttp\Promise\all;


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
    public function index($request)
    {
//        dd(Auth::user()->mother_company_id);
        if (Auth::user()->hasRole('Sales Representative')) {
//            $query = $this->company_model->where('representative_id', Auth::user()->id)->with('subSector');

            //$query =  Auth::user()->assignedCompanies()->where('mother_company_id' , Auth::user()->mother_company_id)
//                            ->with('representative');
            $query = $this->company_model::whereHas('representative' ,function ($q){
                $q->where('user_id' , Auth::user()->id)
                    ->where('company_user.mother_company_id' , Auth::user()->mother_company_id);
            })->with('representative');
            //dd($query->get());
        }

        elseif (Auth::user()->hasRole('Sales Manager')) {
            $query = $this->company_model->WhereIn('sector_id', Auth::user()->sectors->pluck('id'))
                ->with(["representative" =>  function($q){
                    $q->where(function ($q2){
                        $q2->where('user_id' , Auth::user()->id)
                            ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                    })
                    ->where('company_user.mother_company_id' , Auth::user()->mother_company_id);
                }]);
            //dd($query->get()[0]->representative[0]->pivot->confirm_connected);

        }
        else {
            //dd($request->mother_company_id);
//            $query = $this->company_model->with('subSector');
//            $data=  $this->company_model::where(function ($query) {
//                $query->whereHas('representative',function ($q){
//                    $q->where('company_user.mother_company_id',2);
//                });
//                $query->orWhereDoesntHave('representative')
//                ;
//            })->get();
//
//            dd($data);

            $query = $this->company_model::with(["representative" =>  function($q) use ($request) {
                $q->where('company_user.mother_company_id' , $request->mother_company_id);
//                if ($orderBy)
//                {
//                    $q->orderBy('company_user.confirm_connected','desc');
//                    $q->orderBy('company_user.confirm_interview','desc');
//                    $q->orderBy('company_user.confirm_need','desc');
//                    $q->orderBy('company_user.confirm_contract','desc');
//                    $q->orderBy('created_at','desc');
//                }
            }]);
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
            //dd($query->get());
        }

        if ($request->location == 1)
            $query->whereNotNull('location');

        if ($request->location == 2)
            $query->whereNull('location');

        if (isset($request->client_status) && count($request->client_status) > 0){
            $query->whereHas('representative' , function ($q) use ($request){
                $q->whereIn('company_user.client_status' , $request->client_status);
            });
        }

        if ($request->representative_id){
//            $query->where('representative_id', $request->representative_id);
            $query->whereHas('representative' , function ($q) use ($request){
                $q->where('user_id' , $request->representative_id);

            });
        }

        if ($request->representative == 1)
//            $query->whereNotNull('representative_id');
            $query->whereHas('representative' , function ($q) use ($request){
                $q->whereNotNull('user_id');

            });

        if ($request->representative == 2){
            //$query->whereNull('representative_id');
            $query->whereDoesntHave('representative');
        }

        if (isset($request->company_status) && count($request->company_status) > 0) {
//            dd($request->company_status);
            foreach ($request->company_status as $key=>$val){
                if ($val != 'no_meeting'){
                    $query->whereHas('representative' , function ($q) use ($val){
                        $q->where($val, 1);
                    });
                }
                else {
                    //dd(57);
                    //$query->where('confirm_connected', null);
                    $query->whereHas('representative' , function ($q) use ($val){
                        $q->whereNull('confirm_interview');
                        $q->orWhere('confirm_interview', 0);

                    });

                    //$query->where('confirm_need', null);
                    //$query->where('confirm_contract', null);
                }
            }

//            $query->whereHas('representative' , function ($q) use ($request){
//                foreach ($request->company_status as $key=>$val) {
//                    if ($val != 'no_meeting') {
//                        $q->where($request->company_status[0],1);
//                        if ($key == 0)
//                            continue;
//                        $q->orWhere($val,1);
//                    }
//                    else{
//                        $q->whereNull('confirm_interview');
//                        $q->orWhere('confirm_interview', 0);
//                    }
//
//                }
//            });

        }

        if (isset($request->communication_type) && count($request->communication_type) > 0){
            foreach ($request->communication_type as $val)
                $query->whereNotNull($val);
        }

        if (isset($request->evaluation_ids) && count($request->evaluation_ids) > 0){
//            $query->whereIn('evaluation_status', $request->evaluation_ids);
            $query->whereHas('representative' , function ($q) use ($request){
                $q->whereIn('company_user.evaluation_status' , $request->evaluation_ids);
            });
        }

        if ($request->city_id)
            $query->where('city_id', $request->city_id);

        if ($request->country_id)
            $query->where('country_id', $request->country_id);

        if ($request->sector_id)
            $query->where('sector_id', $request->sector_id);

        if ($request->subSector)
            $query->where('sub_sector_id', $request->subSector);

        if ($request->name)
            $query->whereTranslationLike('name', '%' . $request->name . '%');

        $data = array();
        $data['count'] = $query->count();
        $data['companies'] = $query->orderBy('created_at' , 'desc')->paginate(18);
        return $data;

    }

    /** View All companies */
    public function companiesReports_all($request){
        $data['companies'] = $this->index($request);
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();
        $data['mother_companies'] = MotherCompany::all();

        if (Auth::user()->hasRole('ADMIN'))
            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
        else
            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();

        return $data;
    }

    /** Store Company */
    public function store($request)
    {
//      dd(Storage::disk('local')->path('/'));
//      dd(storage_path('app') .'/'. $logo);
        //dd($request->all());

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
            'address' => $request->address,
            'branch_number' => $request->branch_number,
            'num_of_employees' => $request->num_of_employees,
            'website' => $request->website,
            'email' => $request->email,
            'website' => $request->website,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'ecn' => $request->ecn,
            'cr' => $request->cr,
            'ksa_branch' => $request->ksa_branch,

            'company_representative_name' => $request->company_representative_name,
            'company_representative_title' => $request->company_representative_title,
            'company_representative_mobile' => $request->company_representative_mobile,
            'company_representative_phone' => $request->company_representative_phone,
            'company_representative_email' => $request->company_representative_email,

            'hr_director_name' => $request->hr_director_name,
            'hr_director_email' => $request->hr_director_email,
            'hr_director_mobile' => $request->hr_director_mobile,
            'hr_director_phone' => $request->hr_director_phone,
            'hr_director_whatsapp' => $request->hr_director_whatsapp,
            'hr_director_linkedin' => $request->hr_director_linkedin,

            'contract_manager_name' => $request->contract_manager_name,
            'contract_manager_email' => $request->contract_manager_email,
            'contract_manager_mobile' => $request->contract_manager_mobile,
            'contract_manager_phone' => $request->contract_manager_phone,
            'contract_manager_whatsapp' => $request->contract_manager_whatsapp,
            'contract_manager_linkedin' => $request->contract_manager_linkedin,

            'user_id' => auth()->id(),

            'notes' => $request->notes,
            'client_code' => $request->client_code,
            'customer_vat_no' => $request->customer_vat_no,
        ]);

/** IF USER IS REPRESENTATIVE : COMPANY WILL ASSIGNED TO HIM AUTOMATIC */
        if (Auth::user()->parent_id) {
//            $representative_id = Auth::user()->id;
            if (!Auth::user()->sectors()->find($request->sector_id)) {
                Auth::user()->sectors()->attach($request->sector_id);
            }
            $company->representative()->attach( Auth::user()->id , 
                array("mother_company_id" => Auth::user()->mother_company_id));
            
            if($request->client_status){
                $rep = $company->representative()->first();
                $company->representative()->save($rep , 
                    array("mother_company_id" => Auth::user()->mother_company_id, "client_status"=>$request->client_status,
                    "client_status_user_id"=>Auth::user()->id));
            }

            if($request->evaluation_status){
                $rep = $company->representative()->first();
                $company->representative()->save($rep , 
                    array("mother_company_id" => Auth::user()->mother_company_id, "evaluation_status"=>$request->evaluation_status,
                    "evaluation_status_user_id"=>Auth::user()->id));
            }
        }

//        else{
//            $company->representative()->attach(
//                array("mother_company_id" => Auth::user()->mother_company_id ,"client_status"=>$request->client_status,
//                "client_status_user_id"=>Auth::user()->id , "evaluation_status"=>$request->evaluation_status ,
//                "evaluation_status_user_id"=>Auth::user()->id));
//        }

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

        if($request->item){
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
        }

        $this->addLog(auth()->id(), $company->id, 'companies', 'تم اضافة شركة جديدة', 'New Company has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companies.index'));
    }

    /** Edit Company */
    public function edit($company)
    {
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
            'address' => $request->address,
            'branch_number' => $request->branch_number,
            'num_of_employees' => $request->num_of_employees,
            'website' => $request->website,
            'email' => $request->email,
            'website' => $request->website,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,

            'ecn' => $request->ecn,
            'cr' => $request->cr,
            'ksa_branch' => $request->ksa_branch,

            'company_representative_name' => $request->company_representative_name,
            'company_representative_title' => $request->company_representative_title,
            'company_representative_mobile' => $request->company_representative_mobile,
            'company_representative_phone' => $request->company_representative_phone,
            'company_representative_email' => $request->company_representative_email,

            'hr_director_name' => $request->hr_director_name,
            'hr_director_email' => $request->hr_director_email,
            'hr_director_mobile' => $request->hr_director_mobile,
            'hr_director_phone' => $request->hr_director_phone,
            'hr_director_whatsapp' => $request->hr_director_whatsapp,
            'hr_director_linkedin' => $request->hr_director_linkedin,

            'contract_manager_name' => $request->contract_manager_name,
            'contract_manager_email' => $request->contract_manager_email,
            'contract_manager_mobile' => $request->contract_manager_mobile,
            'contract_manager_phone' => $request->contract_manager_phone,
            'contract_manager_whatsapp' => $request->contract_manager_whatsapp,
            'contract_manager_linkedin' => $request->contract_manager_linkedin,

            'user_id' => auth()->id(),
            'notes' => $request->notes,
            'client_code' => $request->client_code,
            'customer_vat_no' => $request->customer_vat_no,
        ]);

//        $rep = $company->representative()->first();
//        if ($rep){
//            $company->representative()->save($rep ,
//                array("mother_company_id" => Auth::user()->mother_company_id, "evaluation_status"=>$request->evaluation_status,
//                    "evaluation_status_user_id"=>Auth::user()->id , "client_status"=>$request->client_status ,
//                    "client_status_user_id"=>Auth::user()->id));
//        }

        $company_user = CompanyUser::where('company_id' , $company->id)->where('mother_company_id' , $request->mother_company_id)->first();

        if ($company_user){
            if($request->client_status){
                $company_user->update([
                    'client_status' => $request->client_status,
                    'client_status_user_id' => auth()->id(),
                ]);
            }

            if($request->evaluation_status){
                $company_user->update([
                    'evaluation_status' => $request->evaluation_status,
                    'evaluation_status_user_id' => auth()->id(),
                ]);
            }
        }




//        if($request->client_status){
//            $rep = $company->representative()->first();
//            $company->representative()->save($rep ,
//                array("mother_company_id" => Auth::user()->mother_company_id, "client_status"=>$request->client_status,
//                    "client_status_user_id"=>Auth::user()->id));
//        }
//
//        if($request->evaluation_status){
//            $rep = $company->representative()->first();
//            $company->representative()->save($rep ,
//                array("mother_company_id" => Auth::user()->mother_company_id, "evaluation_status"=>$request->evaluation_status,
//                    "evaluation_status_user_id"=>Auth::user()->id));
//        }


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

        if($request->item){
            foreach ($request->item as $k => $item) {
                if (isset($company->companyMeetings[$k])) {
                    $company->companyMeetings[$k]->update([
                        'date' => $item['date'],
                        'time' => $item['time'],
                        'company_id' => $company->id,
                        //'user_id' => auth()->id(),
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
        }



        $this->addLog(auth()->id(), $company->id, 'companies', 'تم تعديل شركة ', 'Company has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companies.index'));
    }

    /** Delete Company */
    /** STOP THIS FUNCTION*/
    public function destroy($company)
    {
//        foreach ($company->companyDesignatedcontacts as $companyDesignatedcontact) {
//            $companyDesignatedcontact->delete();
//        }

        $company->companyDesignatedcontacts()->delete();

//        foreach ($company->companyMeetings as $companyMeeting) {
//            $companyMeeting->delete();
//        }

        $company->companyMeetings()->delete();

        $company->salesLeadReports()->delete();

        $company->FnrcoNeed()->delete();
        $company->LinrcoNeed()->delete();

        $company->FnrcoQuotations()->delete();
        $company->LinrcoQuotations()->delete();

        $company->LinrcoAgreement()->delete();
        $company->FnrcoAgreement()->delete();

        $company->LinrcoInvoices()->delete();

        $company->CompanyUser()->delete();

//        $company->representative()->detach();
//        $company->representative()->pivot()->delete();
        if (count($company->representative)){
            DB::table('company_user')
                ->where('user_id', $company->representative[0]->id)
                ->where('company_id', $company->id)
                ->update(array('deleted_at' => DB::raw('NOW()')));
        }

        $company->delete();

        $this->addLog(auth()->id(), $company->id, 'companies', 'تم حذف شركة', 'Company has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companies.index'));
    }

    /** Confirm Connected */
    public function confirmConnected($company_id , $user_mother_company_id)
    {
        //$company = $this->company_model::findOrFail($company_id);
        if (Auth::user()->hasRole(['Sales Manager' , 'Sales Representative'])){
            $company = CompanyUser::where('company_id' , $company_id)->where('mother_company_id' , $user_mother_company_id)->first();
            //dd($company);
            if ($company){
                if (! $company->confirm_connected) {
                    $company->update([
                        'confirm_connected' => 1,
                        'confirm_connected_user_id' => auth()->id(),
                    ]);
                    $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد اتصال الشركة   ', 'Company contact confirmed');
                    //return trans('dashboard.Company contact confirmed');
                    $data['msg'] = trans('dashboard.Company contact confirmed');
                    $data['type'] = "success";
                    return $data;
                }
                elseif ($company->confirm_connected == 1 && Auth::user()->id == $company->confirm_connected_user_id) {
                    $company->update([
                        'confirm_connected' => 0,
                        'confirm_connected_user_id' => auth()->id(),
                    ]);
                    $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء تأكيد اتصال الشركة  ', 'The Company contact confirmation has been canceled');
                    return trans('dashboard.The Company contact confirmation has been canceled');
//                    $data['msg'] = 'The Company contact confirmation has been canceled';
//                    $data['type'] = "success";
//                    return $data;
                }
                else{
//                    return trans('dashboard.You do not have permission');
                    $data['msg'] = trans('You do not have permission');
                    $data['type'] = "warning";
                    return $data;
                }
            }
            else{
//                return trans('dashboard.This company has not been assigned');
                $data['msg'] = trans('This company has not been assigned');
                $data['type'] = "warning";
                return $data;
            }
        }
        else{
            //return trans('dashboard.You do not have permission');
            $data['msg'] = trans('You do not have permission');
            $data['type'] = "warning";
            return $data;

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
    public function confirmInterview($company_id , $user_mother_company_id)
    {
        $main_company = $this->company_model::findOrFail($company_id);

        if (Auth::user()->hasRole(['Sales Manager' , 'Sales Representative'])){
            $company = CompanyUser::where('company_id' , $company_id)->where('mother_company_id' , $user_mother_company_id)->first();

            if ($company){
                if (! $company->confirm_interview) {
                    if (count($main_company->companyMeetings)) {
//                        dd(5);
                        $company->update([
                            'confirm_interview' => 1,
                            'confirm_interview_user_id' => auth()->id(),
                        ]);
                        $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد مقابلة الشركة', 'The company interview was confirmed');
                        $data['msg'] = trans('The company interview was confirmed');
                        $data['type'] = "success";
                        return $data;
                    }
                    $data['msg'] = trans('dashboard.No interview has been added');
                    $data['type'] = "success";
                    return $data;
                }

                elseif ($company->confirm_interview == 1 && Auth::user()->id == $company->confirm_interview_user_id) {
                    $company->update([
                        'confirm_interview' => 0,
                        'confirm_interview_user_id' => auth()->id(),
                    ]);
                    $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء  مقابلة الشركة', 'Company interview canceled');
                    return trans('dashboard.Company interview canceled');
                }

                else{
                    $data['msg'] = trans('You do not have permission');
                    $data['type'] = "warning";
                    return $data;
                }
            }
            else{
                $data['msg'] = trans('This company has not been assigned');
                $data['type'] = "warning";
                return $data;
            }
        }

        else{
            $data['msg'] = trans('You do not have permission');
            $data['type'] = "warning";
            return $data;
        }

    }

    /** Confirm Need */
    public function confirmNeed($company_id , $user_mother_company_id)
    {
        $main_company = $this->company_model::findOrFail($company_id);

        if (Auth::user()->hasRole(['Sales Manager' , 'Sales Representative'])){
            $company = CompanyUser::where('company_id' , $company_id)->where('mother_company_id' , $user_mother_company_id)->first();

            if ($company){
                if (! $company->confirm_need) {
                    if($user_mother_company_id == 1){
                        if (count($main_company->LinrcoNeed)) {
                            $company->update([
                                'confirm_need' => 1,
                                'confirm_need_user_id' => auth()->id(),
                            ]);
                            $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد احتياج الشركة ', 'The company need was confirmed');
//                            return trans('dashboard.The company needs was confirmed');
                            $data['msg'] = trans('dashboard.The company needs was confirmed');
                            $data['type'] = "success";
                            return $data;
                        }
                    }
                    elseif ($user_mother_company_id == 2){
                        if (count($main_company->FnrcoNeed)) {
                            $company->update([
                                'confirm_need' => 1,
                                'confirm_need_user_id' => auth()->id(),
                            ]);
                            $this->addLog(auth()->id(), $company->id, 'companies', 'تم تأكيد احتياج الشركة ', 'The company need was confirmed');
                            $data['msg'] = trans('dashboard.The company needs was confirmed');
                            $data['type'] = "success";
                            return $data;
                        }
                    }

                    $data['msg'] = trans('dashboard.No Need has been added');
                    $data['type'] = "warning";
                    return $data;
                }

                elseif ($company->confirm_need == 1 && Auth::user()->id == $company->confirm_need_user_id) {
                    $company->update([
                        'confirm_need' => 0,
                        'confirm_need_user_id' => auth()->id(),
                    ]);
                    $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء احتياج الشركة', 'Company need canceled');
                    return trans('dashboard.Company need canceled');
                }

                else{
                    $data['msg'] = trans('You do not have permission');
                    $data['type'] = "warning";
                    return $data;
                }
            }
            else{
                $data['msg'] = trans('This company has not been assigned');
                $data['type'] = "warning";
                return $data;
            }
        }

        else{
            $data['msg'] = trans('You do not have permission');
            $data['type'] = "warning";
            return $data;
        }

    }

    /** Confirm Contract */
    public function confirmContract($company_id , $user_mother_company_id)
    {
        $main_company = $this->company_model::findOrFail($company_id);
        if (Auth::user()->hasRole(['Sales Manager' , 'Sales Representative'])){
            $company = CompanyUser::where('company_id' , $company_id)->where('mother_company_id' , $user_mother_company_id)->first();

            if ($company){
                if (! $company->confirm_contract) {
                    if($user_mother_company_id == 1){
                        if(count($main_company->LinrcoAgreement)){
                            $company->update([
                                'confirm_contract' => 1,
                                'confirm_contract_user_id' => auth()->id(),
                            ]);

                            $this->addLog(auth()->id(), $company->id, 'Linrco companies', 'تم تأكيد التعاقد مع الشركة ', 'The contract has been confirmed with the company');
                            $data['msg'] = trans('dashboard.The contract has been confirmed with the company');
                            $data['type'] = "success";
                            return $data;
                        }
                    }
                    elseif ($user_mother_company_id == 2){
                        if(count($main_company->FnrcoAgreement)){
                            $company->update([
                                'confirm_contract' => 1,
                                'confirm_contract_user_id' => auth()->id(),
                            ]);

                            $this->addLog(auth()->id(), $company->id, 'Fnrco companies', 'تم تأكيد التعاقد مع الشركة ', 'The contract has been confirmed with the company');
                            $data['msg'] = trans('dashboard.The contract has been confirmed with the company');
                            $data['type'] = "success";
                            return $data;
                        }
                    }
                }

                elseif ($company->confirm_contract == 1 && Auth::user()->id == $company->confirm_contract_user_id) {
                    $company->update([
                        'confirm_contract' => 0,
                        'confirm_contract_user_id' => auth()->id(),
                    ]);
                    $this->addLog(auth()->id(), $company->id, 'companies', 'تم إلغاء التعاقد مع الشركة  ', 'The contract with the company has been canceled');
                    return trans('dashboard.The contract with the company has been canceled');
                }

                else{
                    $data['msg'] = trans('You do not have permission');
                    $data['type'] = "warning";
                    return $data;
                }
            }
            else{
                $data['msg'] = trans('This company has not been assigned');
                $data['type'] = "warning";
                return $data;
            }
        }

        else{
            $data['msg'] = trans('You do not have permission');
            $data['type'] = "warning";
            return $data;
        }

    }


    public function companyReport_index($request, $all = null , $orderBy = 1)
    {
//        dd($request->mother_company_id);
        if (Auth::user()->hasRole('Sales Representative')) {
            $query = CompanyUser::where('user_id' , Auth::user()->id)
                        ->where('mother_company_id' , Auth::user()->mother_company_id)->with('company');
        }

        elseif (Auth::user()->hasRole('Sales Manager')) {
            $query = CompanyUser::where('mother_company_id' , Auth::user()->mother_company_id)
                                ->where(function ($q){
                                    $q->where('user_id' , Auth::user()->id)
                                        ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                                })->with('company' , 'representative');

        }
        else {
            $query = CompanyUser::where('mother_company_id', $request->mother_company_id)->with('company');
            if ($orderBy)
                {
                    $query->orderBy('confirm_connected','desc');
                    $query->orderBy('confirm_interview','desc');
                    $query->orderBy('confirm_need','desc');
                    $query->orderBy('confirm_contract','desc');
                    $query->orderBy('created_at','desc');
                }
//            dd($query->get());
        }


        if ($request->representative_id){
            $query->where('user_id' , $request->representative_id);
        }

        if (isset($request->company_status) && count($request->company_status) > 0) {
            foreach ($request->company_status as $key=>$val){
                if ($val != 'no_meeting'){
//                    $query->whereHas('representative' , function ($q) use ($val){
//                        $q->where($val, 1);
//                    });
                    $query->where($val , 1);
                }
                else {
                    $query->whereNull('confirm_interview');
                    $query->orWhere('confirm_interview', 0);
//                    $query->whereHas('representative' , function ($q) use ($val){
//                        $q->whereNull('confirm_interview');
//                        $q->orWhere('confirm_interview', 0);
//
//                    });
                }
            }

        }

        if (isset($request->evaluation_ids) && count($request->evaluation_ids) > 0){
            //$query->whereHas('representative' , function ($q) use ($request){
            $query->whereIn('evaluation_status' , $request->evaluation_ids);
            //});
        }

        if ($request->city_id){
//            $query->where('city_id', $request->city_id);
            $query->whereHas('company',function ($q) use ($request){
                $q->where('city_id', $request->city_id);
            });
        }

        if ($request->country_id){
//          $query->where('country_id', $request->country_id);
            $query->whereHas('company',function ($q) use ($request){
                $q->where('country_id', $request->country_id);
            });
        }

        if ($request->sector_id){
//            $query->where('sector_id', $request->sector_id);
            $query->whereHas('company',function ($q) use ($request){
                $q->where('sector_id', $request->sector_id);
            });
        }

        if ($request->subSector){
//            $query->where('sub_sector_id', $request->subSector);
            $query->whereHas('company',function ($q) use ($request){
                $q->where('sub_sector_id', $request->subSector);
            });
        }

        if ($request->name){
            //$query->whereTranslationLike('name', '%' . $request->name . '%');
            $query->whereHas('company',function ($q) use ($request){
                $q->whereTranslationLike('name' , '%' . $request->name . '%');
            });
        }

//        if($orderBy){
        if ($all){
            return $query->get();
        }

        else {
            $data = array();
            $data['count'] = $query->count();
            $data['companies_user'] = $query->paginate(18);
            return $data;
        }
//        }
//        else{
//            $data = array();
//            $data['count'] = $query->count();
//            $data['companies'] = $query->orderBy('created_at' , 'desc')->paginate(18);
//            return $data;
//        }

        //dd($data['companies']);
//        return $all ? $query->get() : $query->paginate(18);
    }

    /** companies Reports */
    public function companiesReports($request, $all = false , $orderBy = false)
    {
        $data['companies_user'] = $this->companyReport_index($request, $all , $orderBy);
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();
        $data['mother_companies'] = MotherCompany::all();

        if (Auth::user()->hasRole('ADMIN'))
            $data['representatives'] = $this->user_model::where('active' , 1)
                                            ->where(function ($q){
                                                $q->whereNotNull('parent_id')
                                                    ->orWhereHas('childs');
                                            })->get();
        else

            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();
        //dd($data);

        return $data;
    }


    /** Send Email To Company */
    public function sendEmail($request)
    {
        if (!$request->email){
            Alert::warning('warning', trans('dashboard.there is no mail'));
            return redirect(route('companies.index'));
        }
        Mail::send([], [], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Markerting Sysytem');
            $message->setBody($request->message);
        });

        Alert::success('success', trans('dashboard.sent successfully'));
        return redirect(route('companies.index'));
    }

}
