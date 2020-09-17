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


    /** View All CompanyNeeds */
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

    /** Create CompanyNeed Form */
    public function create($company_id){
        return  $this->country_model::all();
    }

    /** Store CompanyNeed */
    public function store($request)
    {
        $company_need = $this->company_need_model::create([
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

        $this->addLog(auth()->id() , $company_need->id , 'company_needs' , 'تم اضافة احتياجات شركة ' , 'New Company Need has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('company_needs.index' , $request->company_id));
    }


    /** Show One CompanyNeed */
    public function show($company)
    {
        return $this->companyRepositoryinterface->show($company);
    }


    /** Submit Edit CompanyNeed */
    public function update($request , $companyNeed){
        //dd($request->data_flow);
        $companyNeed->update([
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

        $this->addLog(auth()->id() , $companyNeed->id , 'company_needs' , 'تم اضافة احتياجات شركة ' , 'New Company Need has been added');


        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('company_needs.index' , $companyNeed->company_id));

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