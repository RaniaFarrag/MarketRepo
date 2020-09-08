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
use Carbon\Carbon;
use DateTime;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
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


    public function __construct(Country $country , City $city , Sector $sector , SubSector $subSector , Company $company
        , CompanyDesignatedContact $companyDesignatedContact , CompanyMeeting $companyMeeting)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
        $this->company_model = $company;
        $this->company_designated_contact_model = $companyDesignatedContact;
        $this->company_meeting_model = $companyMeeting;

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

    /** View All countries */
    public function index(){
        return $this->company_model->with('subSector')->orderBy('created_at' , 'desc')->paginate(20);
    }

    /** Store Role */
    public function store($request)
    {
        //dd($request->client_status);
        //dd(count($request->designated_contact_name));
//        dd(Storage::disk('local')->path('/'));
//        dd(storage_path('app') .'/'. $logo);

        $logo = $this->verifyAndStoreFile($request , 'logo');
        $first_business_card = $this->verifyAndStoreFile($request , 'first_business_card');
        $second_business_card = $this->verifyAndStoreFile($request , 'second_business_card');
        $third_business_card = $this->verifyAndStoreFile($request , 'third_business_card');

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
            'client_status' => $request->client_status,
            'client_status_user_id' => auth()->id(),
            'notes' => $request->notes,
        ]);


        for($i=0 ; $i<count($request->designated_contact_name) ; $i++){
            if($request->designated_contact_name[$i] != null){
                $company_designated_contact = $this->company_designated_contact_model::create([
                    'name' => $request->designated_contact_name[$i],
                    'job_title' => $request->designated_contact_job_title[$i],
                    'mobile' => $request->designated_contact_mobile[$i],
                    'linkedin' => $request->designated_contact_linkedin[$i],
                    'whatsapp' => $request->designated_contact_whatsapp[$i],
                    'email' => $request->designated_contact_email[$i],
                    'company_id' => $company->id,
                ]);
            }
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

            $company_meeting = $this->company_meeting_model::create([
                'date' => $item['date'],
                'time' => $item['time'],
                'company_id' => $company->id,
                'user_id' => auth()->id(),
            ]);
        }

        $this->addLog(auth()->id() , $company->id , 'companies' , 'تم اضافة شركة جديدة' , 'New Company has been added');

        return redirect(route('companies.index'))->with('success' , trans('dashboard. added successfully'));
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

    /** Submit Edit Role */
    public function update($request , $company){

        //dd(count($request->designated_contact_name));
//        dd($request->item);
        if($request->hasFile('logo')){
            $logo = $this->verifyAndStoreFile($request , 'logo');
        }
        else{
            $logo = $company->logo;
        }

        if($request->hasFile('first_business_card')){
            $first_business_card = $this->verifyAndStoreFile($request , 'first_business_card');
        }
        else{
            $first_business_card = $company->first_business_card;
        }


        if($request->hasFile('second_business_card')){
            $second_business_card = $this->verifyAndStoreFile($request , 'second_business_card');
        }
        else{
            $second_business_card = $company->second_business_card;
        }


        if($request->hasFile('third_business_card')){
            $third_business_card = $this->verifyAndStoreFile($request , 'third_business_card');
        }
        else{
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
            'client_status' => $request->client_status,
            'client_status_user_id' => auth()->id(),
            'notes' => $request->notes,
        ]);

        //dd(count($company->companyDesignatedcontacts));

        for($i=0 ; $i<count($request->designated_contact_name) ; $i++){
            if (isset($company->companyDesignatedcontacts[$i])){
                $company->companyDesignatedcontacts[$i]->update([
                    'name' => $request->designated_contact_name[$i],
                    'job_title' => $request->designated_contact_job_title[$i],
                    'mobile' => $request->designated_contact_mobile[$i],
                    'linkedin' => $request->designated_contact_linkedin[$i],
                    'whatsapp' => $request->designated_contact_whatsapp[$i],
                    'email' => $request->designated_contact_email[$i],
                    'company_id' => $company->id,
                ]);
            }
            else{
                $this->company_designated_contact_model::create([
                    'name' => $request->designated_contact_name[$i],
                    'job_title' => $request->designated_contact_job_title[$i],
                    'mobile' => $request->designated_contact_mobile[$i],
                    'linkedin' => $request->designated_contact_linkedin[$i],
                    'whatsapp' => $request->designated_contact_whatsapp[$i],
                    'email' => $request->designated_contact_email[$i],
                    'company_id' => $company->id,
                ]);
            }
        }

        foreach ($request->item as $k=>$item) {
             $company->companyMeetings[$k]->update([
                'date' => $item['date'],
                'time' => $item['time'],
                'company_id' => $company->id,
                'user_id' => auth()->id(),
            ]);
        }

        $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تعديل شركة ' , 'Company has been updated');

        return redirect(route('companies.index'))->with('success' , trans('dashboard.updated successfully'));

    }

    /** Delete Role */
    public function destroy($company){
//        dd($company->companyDesignatedcontacts);
        foreach ($company->companyDesignatedcontacts as $companyDesignatedcontact){
            $companyDesignatedcontact->delete();
        }

        foreach ($company->companyMeetings as $companyMeeting){
            $companyMeeting->delete();
        }
        $company->delete();

        $this->addLog(auth()->id() , $company->id , 'companies' , 'تم حذف شركة' , 'Company has been deleted');

        return redirect(route('companies.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}