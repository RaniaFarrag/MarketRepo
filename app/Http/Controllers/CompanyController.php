<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $companyRepositoryinterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryinterface)
    {
        $this->companyRepositoryinterface = $companyRepositoryinterface;
    }

    /** View All companies */
    public function index()
    {
        $companies = $this->companyRepositoryinterface->index();

        return view('system.companies.index')->with('companies' , $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /** Create Company */
    public function create()
    {
        $data = $this->companyRepositoryinterface->create();
        return view('system.companies.create')->with('data' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /** Store Company */
    public function store(CompanyRequest $request)
    {
        //dd($request->item[0]['date']);
        return $this->companyRepositoryinterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Show One Company */
    public function show(Company $company)
    {
        if ($company->client_status){
            $client_status_user = User::findOrFail($company->client_status_user_id);
            return view ('system.companies.show')->with(['company' => $company , 'client_status_user' => $client_status_user]);
        }

        return view ('system.companies.show')->with(['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Edit Company */
    public function edit(Company $company)
    {
        $data = $this->companyRepositoryinterface->edit($company);
        return view('system.companies.edit')->with(['company' => $company , 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Submit Edit Company */
    public function update(CompanyRequest $request, Company $company)
    {
        return $this->companyRepositoryinterface->update($request , $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Delete Company */
    public function destroy(Company $company)
    {
        return $this->companyRepositoryinterface->destroy($company);
    }

    /** Confirm Connected */
    public function confirmConnected($company_id){
        return $this->companyRepositoryinterface->confirmConnected($company_id);
    }

//    /** Cancel Confirm Connected */
//    public function cancelConfirmConnected($company_id){
//        return $this->companyRepositoryinterface->cancelConfirmConnected($company_id);
//    }

    /** Confirm Interview */
    public function confirmInterview($company_id){
        return $this->companyRepositoryinterface->confirmInterview($company_id);
    }

    /** Confirm Need */
    public function confirmNeed($company_id){
        return $this->companyRepositoryinterface->confirmNeed($company_id);
    }

    /** Confirm Contract */
    public function confirmContract($company_id){
        return $this->companyRepositoryinterface->confirmContract($company_id);
    }
}
