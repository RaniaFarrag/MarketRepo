<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyNeedRequest;
use App\Interfaces\CompanyNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use Illuminate\Http\Request;

class CompanyNeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $companyNeedRepositoryinterface;

    public function __construct(CompanyNeedRepositoryInterface $companyNeedRepositoryinterface)
    {
        $this->companyNeedRepositoryinterface = $companyNeedRepositoryinterface;
    }

    public function index($company_id)
    {
        $needs = $this->companyNeedRepositoryinterface->index($company_id);
        return view('system.companies.needs.index')->with(['needs' => $needs , 'company_id' => $company_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        $countries = $this->companyNeedRepositoryinterface->create($company_id);
        $company = Company::findOrFail($company_id);

        $employeement_types = $this->companyNeedRepositoryinterface->getEmployeementtypes($company->sector_id);

        if ($company->sector_id == 1){
            //dd($company->sector_id);
            return view('system.companies.needs.healthcare.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $company_id , 'sector_id' => $company->sector_id]);
        }
        return view('system.companies.needs.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyNeedRequest $request)
    {
        return $this->companyNeedRepositoryinterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyNeed $companyneed)
    {
        $countries = $this->companyNeedRepositoryinterface->create($companyneed->company_id);
        $employeement_types = $this->companyNeedRepositoryinterface->getEmployeementtypes($companyneed->sector_id);

        if ($companyneed->sector_id == 1){
            //dd($company->sector_id);
            return view('system.companies.needs.healthcare.edit')->with(['countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $companyneed->company_id , 'sector_id' => $companyneed->sector_id]);
        }
        return view('system.companies.needs.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
