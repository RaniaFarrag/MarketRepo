<?php

namespace App\Http\Controllers;

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
    public function assignCompanyToRepresentative(){
        $data = $this->assignCompanyRepositoryinterface->assignCompanyToRepresentative();

//        dd($data['sectors']);
//        dd($data['representatives']);
//        dd($data['representatives']);

        return view('system.corporate_assignment.assign_companies_to_representatives')->with('data' , $data);
    }


}
