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
        return response()->json(['companies' => $companies]);
    }

    /** Submit Assign Company To Representative */
    public function submitAssignCompanyToRepresentative(AssignCompanyRequest $request){
        return $this->assignCompanyRepositoryinterface->submitAssignCompanyToRepresentative($request);
    }


}
