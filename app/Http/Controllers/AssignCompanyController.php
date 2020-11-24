<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignCompanyRequest;
use App\Interfaces\AssignCompanyRepositoryInterface;
use Illuminate\Http\Request;

class AssignCompanyController extends Controller
{

    protected $assignCompanyRepositoryinterface;

    public function __construct(AssignCompanyRepositoryInterface $assignCompanyRepositoryinterface)
    {
        $this->assignCompanyRepositoryinterface = $assignCompanyRepositoryinterface;
    }

    /** Assign Company To Representative Form */
    public function assignCompanyToRepresentativeForm(){
        $data = $this->assignCompanyRepositoryinterface->assignCompanyToRepresentativeForm();

        return view('system.corporate_assignment.assign_companies_to_representatives')->with('data' , $data);
    }

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector */
    public function fetchCompanyData(Request $request)
    {
        $companies =  $this->assignCompanyRepositoryinterface->fetchCompanyData($request);
        //dd($companies);
        return response()->json(['companies' => $companies]);
    }

    /** Submit Assign Company To Representative */
    public function submitAssignCompanyToRepresentative(AssignCompanyRequest $request){
        return $this->assignCompanyRepositoryinterface->submitAssignCompanyToRepresentative($request);
    }

    /** Get All Representatives */
    public function getAllRepresentatives(){
        //return view('system.corporate_assignment.representatives_companies');
        $representatives =  $this->assignCompanyRepositoryinterface->getAllRepresentatives();

        return view('system.corporate_assignment.representatives_companies')->with('representatives' , $representatives);
    }

    /** Get Companies Of Representative */
    public function getCompaniesofRepresentative($representative_id){
        $representative =  $this->assignCompanyRepositoryinterface->getCompaniesofRepresentative($representative_id)['representative'];
        $companies_of_representative =  $this->assignCompanyRepositoryinterface->getCompaniesofRepresentative($representative_id)['rep_companies'];
        //dd($representative->id);
        //dd(count($companies_of_representative));
//        dd($companies_of_representative[0]->representative);
        return view('system.corporate_assignment.companies_of_one_representative')
            ->with(['companies_of_representative' => $companies_of_representative , 'representative' => $representative]);
    }

    /** Cancel The Company Assignment */
    public function cancelCompanyassignment($company_id , $rep_id){
        //dd($company_id);
        return $this->assignCompanyRepositoryinterface->cancelCompanyassignment($company_id , $rep_id);

    }

}
