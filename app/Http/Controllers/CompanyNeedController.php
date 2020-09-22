<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyNeedRequest;
use App\Interfaces\CompanyNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use Illuminate\Http\Request;

class CompanyNeedController extends Controller
{
    protected $companyNeedRepositoryinterface;

    public function __construct(CompanyNeedRepositoryInterface $companyNeedRepositoryinterface)
    {
        $this->companyNeedRepositoryinterface = $companyNeedRepositoryinterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View All CompanyNeed */
    public function index($company_id)
    {
        $needs = $this->companyNeedRepositoryinterface->index($company_id);
        $company = Company::findOrFail($company_id);
        return view('system.companies.needs.index')->with(['needs' => $needs , 'company_id' => $company_id , 'company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create CompanyNeed */
    public function create($company_id)
    {
        $countries = $this->companyNeedRepositoryinterface->create($company_id);
        $company = Company::findOrFail($company_id);

        $employeement_types = $this->companyNeedRepositoryinterface->getEmployeementtypes($company->sector_id);

        if ($company->sector_id == 1){
            return view('system.companies.needs.healthcare.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $company_id , 'sector_id' => $company->sector_id]);
        }
        return view('system.companies.needs.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types,
                'company_id' => $company_id , 'sector_id' => $company->sector_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store CompanyNeed */
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
    public function edit(CompanyNeed $companyNeed)
    {
        $countries = $this->companyNeedRepositoryinterface->create($companyNeed->company_id);
        $employeement_types = $this->companyNeedRepositoryinterface->getEmployeementtypes($companyNeed->sector_id);

        if ($companyNeed->sector_id == 1){
            //dd($company->sector_id);
            return view('system.companies.needs.healthcare.edit')->with(['companyneed' => $companyNeed , 'countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $companyNeed->company_id , 'sector_id' => $companyNeed->sector_id]);
        }
        return view('system.companies.needs.edit')->with(['companyneed' => $companyNeed ,'countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $companyNeed->company_id , 'sector_id' => $companyNeed->sector_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit CompanyNeed */
    public function update(CompanyNeedRequest $request, CompanyNeed $companyNeed)
    {
        //dd($companyNeed);
        return $this->companyNeedRepositoryinterface->update($request , $companyNeed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Delete CompanyNeed */
    public function destroy(CompanyNeed $companyNeed)
    {
        return $this->companyNeedRepositoryinterface->destroy($companyNeed);
    }
}