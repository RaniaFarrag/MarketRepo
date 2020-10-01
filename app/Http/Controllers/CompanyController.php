<?php

namespace App\Http\Controllers;

use App\Exports\companiesReport;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


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
    public function index(Request $request)
    {
        $companies = $this->companyRepositoryinterface->companiesReports($request)['companies'];
        $sectors= $this->companyRepositoryinterface->companiesReports($request)['sectors'];
        $countries= $this->companyRepositoryinterface->companiesReports($request)['countries'];
        $representatives= $this->companyRepositoryinterface->companiesReports($request)['representatives'];

        if($request->ajax()){
            $data['viewBlade']= view('system.companies.index_partial')->with(['companies' => $companies])->render();
            $data['count']= count($companies);
            return response()->json($data);
        }

        return view('system.companies.index')->with(['companies' => $companies ,
            'sectors' => $sectors , 'countries' => $countries , 'representatives'=>$representatives]);
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
        $evaluation_status_user = '';
        $client_status_user = '';

        if ($company->client_status){
            $client_status_user = User::findOrFail($company->client_status_user_id);
            //return view ('system.companies.show')->with(['company' => $company , 'client_status_user' => $client_status_user]);
        }

        if ($company->evaluation_status){
            $evaluation_status_user = User::findOrFail($company->evaluation_status_user_id);
            //dd($evaluation_status_user);
        }

        return view ('system.companies.show')->with(['company' => $company , 'client_status_user' => $client_status_user ,
            'evaluation_status_user' => $evaluation_status_user]);
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
        $evaluation_status_user = '';
        $client_status_user = '';

        if ($company->client_status){
            $client_status_user = User::findOrFail($company->client_status_user_id);
            //return view('system.companies.edit')->with(['company' => $company , 'data' => $data , 'client_status_user' => $client_status_user]);
        }

        if ($company->evaluation_status){
            $evaluation_status_user = User::findOrFail($company->evaluation_status_user_id);
            //dd($evaluation_status_user);
        }

        return view('system.companies.edit')->with(['company' => $company , 'data' => $data ,
            'client_status_user' => $client_status_user , 'evaluation_status_user' => $evaluation_status_user]);
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


    /** Company Report */
    public function companiesReports(Request $request){

        $companies= $this->companyRepositoryinterface->companiesReports($request)['companies'];
        $countries= $this->companyRepositoryinterface->companiesReports($request)['countries'];
        $sectors= $this->companyRepositoryinterface->companiesReports($request)['sectors'];

        if ($request->ajax()) {
            return view('system.reports.company_report_partial',compact('companies'))->render();
        }
        return view('system.reports.company_report',compact('companies','countries','sectors'));
    }


    public function extractCompanyReportExcel(Request $request)
    {
        $companies= $this->companyRepositoryinterface->companiesReports($request,true)['companies'];
        return Excel::download(new companiesReport($companies), 'CompanyReportExcel.xlsx');
    }

    public function print_show_company()
    {
        $pdf = Pdf::loadView('system.companies.company_pdf');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "company.pdf'"]);
    }

    /** Send Email To Company */
    public function sendEmail(Request $request){
        return $this->companyRepositoryinterface->sendEmail($request);
    }

}
