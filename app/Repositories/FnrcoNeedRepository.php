<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\FnrcoNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use App\Models\Country;
use App\Models\EmploymentType;
use App\Models\FnrcoNeed;
use App\Models\LinrcoNeed;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;


class FnrcoNeedRepository implements FnrcoNeedRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $linrco_need_model;
    protected $company_model;
    protected $country_model;

    public function __construct(FnrcoNeed $fnrcoNeed , Country $country , Company $company)
    {
        $this->company_model = $company;
        $this->fnrco_need_model = $fnrcoNeed;
        $this->country_model = $country;
        $this->employment_type_model = $country;
    }


    /** View All LinrcoNeeds */
    public function index($company_id){
        return $this->fnrco_need_model::where('company_id' , $company_id)->with('company')->paginate(20);
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

    /** Create LinrcoNeed Form */
    public function create(){
        return  $this->country_model::all();
    }

    /** Store LinrcoNeed */
    public function store($request)
    {
        $fnrco_need = $this->fnrco_need_model::create([
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
//            'sector_id' => $request->sector_id,
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

        $this->addLog(auth()->id() , $fnrco_need->id , 'fnrco_needs' , 'تم اضافة احتياجات شركة ' , 'New Company Need has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('company_needs.index' , [$request->company_id , $request->mother_company_id]));
    }


    /** Submit Edit CompanyNeed */
    public function update($request , $fnrco_need){
        //dd($request->data_flow);
        $fnrco_need->update([
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
//            'sector_id' => $request->sector_id,
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

        $this->addLog(auth()->id() , $fnrco_need->id , 'fnrco_needs' , 'تم اضافة احتياجات شركة ' , 'New Fnrco need has been added');


        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('company_needs.index' , [$fnrco_need->company_id, $request->mother_company_id]));

    }


    /** Delete CompanyNeed */
    public function destroy($need_id , $mother_company_id){
        //Alert::success('warning', trans('dashboard.Are You Sure ?'));
        $need = $this->fnrco_need_model::findOrFail($need_id);
        $need->delete();

        $this->addLog(auth()->id() , $need->id , 'fnrco_needs' , 'تم حذف احتياج للشركة ' , 'FnrcoNeed has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('company_needs.index' , [$need->company_id , $mother_company_id]));
    }

}