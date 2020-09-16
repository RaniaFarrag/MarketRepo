<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\CompanyNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use App\Models\Country;
use App\Models\EmploymentType;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;


class CompanyNeedRepository implements CompanyNeedRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $company_need_model;
    protected $company_model;
    protected $country_model;

    public function __construct(CompanyNeed $companyNeed , Country $country , Company $company)
    {
        $this->company_model = $company;
        $this->company_need_model = $companyNeed;
        $this->country_model = $country;
        $this->employment_type_model = $country;
    }


    /** View All CompanyNeed */
    public function index($company_id){
        return $this->company_need_model::where('company_id' , $company_id)->paginate(20);
    }

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id){
        if ($sector_id == 1){
            return $employeement_types = EmploymentType::where('sector_id' , 1)->get();
        }
        else{
            return $employeement_types = EmploymentType::where('sector_id' , '<>' , 1)->get();
        }
    }

    /** View All CompanyNeed */
    public function create($company_id){
        return  $this->country_model::all();
    }

    /** Store Role */
    public function store($request)
    {
        //dd($request->sector_id);
        $company = $this->company_need_model::create([
            // Common Inputs
            'employment_type_id' => $request->employment_type_id,
            'required_position' => $request->required_position,
            'job_description' => $request->job_description,
            'candidates_number' => $request->candidates_number,
            'country_id' => $request->country_id,
            'gender' => $request->gender,
            'minimum_age' => $request->minimum_age,
            'total_salary' => $request->total_salary,
            'special_note' => $request->special_note,
            'company_id' => $request->company_id,
            'sector_id' => $request->sector_id,
            'user_id' => auth()->id(),

            // Medical Inputs
            'educational_qualification' => $request->educational_qualification,
            'data_flow' => $request->data_flow,
            'prometric' => $request->prometric,
            'classification' => $request->classification,
            'total_experience' => $request->total_experience,
            'area_of_experience' => $request->area_of_experience,
            'other_skills' => $request->other_skills,

            // Default Inputs
            'contract_duration' => $request->contract_duration,
            'experience_range' => $request->experience_range,
            'work_location' => $request->work_location,
            'work_hours' => $request->work_hours,
            'deadline' => $request->deadline,

        ]);

        $this->addLog(auth()->id() , $company->id , 'company_needs' , 'تم اضافة احتياجات شركة ' , 'New Company Need has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('company_needs.index' , $request->company_id));
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

            'contract_manager_name' => $request->contract_manager_name,
            'contract_manager_email' => $request->contract_manager_email,
            'contract_manager_mobile' => $request->contract_manager_mobile,
            'contract_manager_phone' => $request->contract_manager_phone,
            'contract_manager_whatsapp' => $request->contract_manager_whatsapp,

            'user_id' => auth()->id(),

            'client_status' => $request->client_status,
            'client_status_user_id' => auth()->id(),
            'notes' => $request->notes,
        ]);

        //dd(count($company->companyDesignatedcontacts));

        for($i=0 ; $i<count($request->designated_contact_name) ; $i++){
            if (isset($company->companyDesignatedcontacts[$i])){
//                if($request->designated_contact_name[$i] != null){
                    $company->companyDesignatedcontacts[$i]->update([
                        'name' => $request->designated_contact_name[$i],
                        'job_title' => $request->designated_contact_job_title[$i],
                        'mobile' => $request->designated_contact_mobile[$i],
                        'linkedin' => $request->designated_contact_linkedin[$i],
                        'whatsapp' => $request->designated_contact_whatsapp[$i],
                        'email' => $request->designated_contact_email[$i],
                        'company_id' => $company->id,
                    ]);
//                }

            }

            else{
                if($request->designated_contact_name[$i] != null){
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
        }

        foreach ($request->item as $k=>$item) {
            if (isset($company->companyMeetings[$k])){
                $company->companyMeetings[$k]->update([
                    'date' => $item['date'],
                    'time' => $item['time'],
                    'company_id' => $company->id,
                    'user_id' => auth()->id(),
                ]);
            }
            else{
                if ($item['date']){
                    $company_meeting = $this->company_meeting_model::create([
                        'date' => $item['date'],
                        'time' => $item['time'],
                        'company_id' => $company->id,
                        'user_id' => auth()->id(),
                    ]);
                }
            }

        }

        $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تعديل شركة ' , 'Company has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companies.index'));

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

        Alert::success('success', trans('dashboard. deleted successfully'));
        return redirect(route('companies.index'));
    }

    /** Confirm Connected */
    public function confirmConnected($company_id){
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_connected == 0){
            $company->update([
                'confirm_connected' => 1,
                'confirm_connected_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تأكيد اتصال الشركة   ' , 'Company contact confirmed');
            return trans('dashboard.Company contact confirmed');
        }
        elseif ($company->confirm_connected == 1){
            $company->update([
                'confirm_connected' => 0,
                'confirm_connected_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم إلغاء تأكيد اتصال الشركة  ' , 'The Company contact confirmation has been canceled');
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
    public function confirmInterview($company_id){
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_interview == 0){
            if (count($company->companyMeetings)){
                $company->update([
                    'confirm_interview' => 1,
                    'confirm_interview_user_id' => auth()->id(),
                ]);
                $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تأكيد مقابلة الشركة' , 'The company interview was confirmed');
                return trans('dashboard.The company interview was confirmed');
            }
            return trans('dashboard.No interview has been added');
        }
        elseif ($company->confirm_interview == 1){
            $company->update([
                'confirm_interview' => 0,
                'confirm_interview_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم إلغاء  مقابلة الشركة' , 'Company interview canceled');
            return trans('dashboard.Company interview canceled');
        }

    }

    /** Confirm Need */
    public function confirmNeed($company_id){
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_interview == 0){
            $company->update([
                'confirm_interview' => 1,
                'confirm_interview_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تأكيد مقابلة الشركة' , 'The company interview was confirmed');
            return trans('dashboard.The company interview was confirmed');
        }


    }

    /** Confirm Contract */
    public function confirmContract($company_id){
        $company = $this->company_model::findOrFail($company_id);

        if ($company->confirm_contract == 0){
            $company->update([
                'confirm_contract' => 1,
                'confirm_contract_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم تأكيد التعاقد مع الشركة ' , 'The contract has been confirmed with the company');
            return trans('dashboard.The contract has been confirmed with the company');
        }
        elseif ($company->confirm_contract == 1){
            $company->update([
                'confirm_contract' => 0,
                'confirm_contract_user_id' => auth()->id(),
            ]);
            $this->addLog(auth()->id() , $company->id , 'companies' , 'تم إلغاء التعاقد مع الشركة  ' , 'The contract with the company has been canceled');
            return trans('dashboard.The contract with the company has been canceled');
        }
    }

}