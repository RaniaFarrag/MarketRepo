<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyRepresentativeRepositoryInterface;
use Illuminate\Http\Request;

class RepresentativeCompanyController extends Controller
{

    protected $companyrepresentativeRepositoryinterface;

    public function __construct(CompanyRepresentativeRepositoryInterface $companyRepresentativeRepositoryinterface)
    {
        $this->companyrepresentativeRepositoryinterface = $companyRepresentativeRepositoryinterface;
    }

    /** Assign Company To Representative Form */
    public function assignCompanyToRepresentative(){
        $representatives = $this->companyrepresentativeRepositoryinterface->assignCompanyToRepresentative();
    }


}
