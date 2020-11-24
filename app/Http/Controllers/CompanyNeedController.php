<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyNeedRequest;
use App\Interfaces\FnrcoNeedRepositoryInterface;
use App\Interfaces\LinrcoNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyNeedController extends Controller
{
    protected $linrcoNeedRepositoryinterface;
    protected $fnrcoNeedRepositoryinterface;

    public function __construct(LinrcoNeedRepositoryInterface $linrcoNeedRepositoryinterface , FnrcoNeedRepositoryInterface $fnrcoNeedRepositoryinterface)
    {
        $this->linrcoNeedRepositoryinterface = $linrcoNeedRepositoryinterface;
        $this->fnrcoNeedRepositoryinterface = $fnrcoNeedRepositoryinterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View All CompanyNeed */
    public function index($company_id , $mother_company_id)
    {
//        $needs = $this->companyNeedRepositoryinterface->index($company_id);
//        $company = Company::findOrFail($company_id);
//        return view('system.companies.needs.index')->with(['needs' => $needs , 'company_id' => $company_id , 'company'=>$company]);
        //dd($mother_company_id);
        $company = Company::findOrFail($company_id);
        if (Auth::user()->hasRole('ADMIN')){
            if ($mother_company_id == 1){
                $linrco_needs = $this->linrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.linrco_needs.index')->with(['needs' => $linrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_needs = $this->fnrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.fnrco_needs.index')->with(['needs' => $fnrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
        }

        else{
            if (Auth::user()->mother_company_id == 1){
                $linrco_needs = $this->linrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.linrco_needs.index')->with(['needs' => $linrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_needs = $this->fnrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.fnrco_needs.index')->with(['needs' => $fnrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create CompanyNeed */
    public function create($company_id , $mother_company_id)
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
        $employeement_types = $this->companyNeedRepositoryinterface->getEmployeementtypes($companyNeed->company->sector_id);

        //dd($companyNeed->company->sector_id);
        if ($companyNeed->company->sector_id == 1){
            //dd($companyNeed->company->sector_id);
            return view('system.companies.needs.healthcare.edit')->with(['companyneed' => $companyNeed , 'countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $companyNeed->company_id , 'sector_id' => $companyNeed->company->sector_id]);
        }
        return view('system.companies.needs.edit')->with(['companyneed' => $companyNeed ,'countries' => $countries , 'employeement_types' => $employeement_types ,
                'company_id' => $companyNeed->company_id , 'sector_id' => $companyNeed->company->sector_id]);
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

    public function printNeed($need_id){

        $need = CompanyNeed::findOrFail($need_id);
//        dd($need->company->sector_id);
        if($need->company->sector_id == 1){
            $pdf = Pdf::loadView('system.companies.needs.healthcare.healthcare_need_pdf' , compact('need'));
        }
        else{
            $pdf = Pdf::loadView('system.companies.needs.need_pdf' , compact('need'));
        }


        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "company_need.pdf'"]);
    }
}
