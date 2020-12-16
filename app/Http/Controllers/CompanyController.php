<?php

namespace App\Http\Controllers;

use App\Exports\companiesReport;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $data = $this->companyRepositoryinterface->companiesReports($request)['companies'];

        //dd($data);

        $sectors = $this->companyRepositoryinterface->companiesReports($request)['sectors'];
        $countries = $this->companyRepositoryinterface->companiesReports($request)['countries'];
        $representatives = $this->companyRepositoryinterface->companiesReports($request)['representatives'];
        $mother_companies = $this->companyRepositoryinterface->companiesReports($request)['mother_companies'];

        if($request->ajax()){
            if (Auth::user()->hasRole('ADMIN')){
                $mother_company_id = $request->mother_company_id;
            }
            else{
                $mother_company_id = Auth::user()->mother_company_id;
            }
            $data_json['viewBlade']= view('system.companies.index_partial')
                ->with(['data' => $data , 'hidden_mother_company_id' => $mother_company_id])->render();
            $data_json['count']= $data['count'];
            return response()->json($data_json);
        }
        return view('system.companies.index')->with(['data' => $data , 'sectors' => $sectors , 'mother_companies' => $mother_companies,
            'countries' => $countries , 'representatives'=>$representatives]);
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
        //dd($request->all());
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
            if ($company->client_status_user){
                $client_status_user = User::findOrFail($company->client_status_user_id);
            }
            //return view ('system.companies.show')->with(['company' => $company , 'client_status_user' => $client_status_user]);
        }

        if ($company->evaluation_status){
            if ($company->evaluator){
                $evaluation_status_user = User::findOrFail($company->evaluation_status_user_id);
            }
            //dd($evaluation_status_user);
        }

//        return view ('system.companies.show')->with(['company' => $company , 'client_status_user' => $client_status_user ,
//            'evaluation_status_user' => $evaluation_status_user]);

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
//        dd($company);
        $data = $this->companyRepositoryinterface->edit($company);

//        if ($company->client_status){
//            $client_status_user = $company->client_status_user_id;
//        }
//
//        if ($company->evaluation_status){
//            $evaluation_status_user = User::findOrFail($company->evaluation_status_user_id);
//        }

        return view('system.companies.edit')->with(['company' => $company , 'data' => $data ]);
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
    public function confirmConnected($company_id , $user_mother_company_id){
        return $this->companyRepositoryinterface->confirmConnected($company_id , $user_mother_company_id);
    }

//    /** Cancel Confirm Connected */
//    public function cancelConfirmConnected($company_id){
//        return $this->companyRepositoryinterface->cancelConfirmConnected($company_id);
//    }

    /** Confirm Interview */
    public function confirmInterview($company_id , $user_mother_company_id){
        return $this->companyRepositoryinterface->confirmInterview($company_id , $user_mother_company_id);
    }

    /** Confirm Need */
    public function confirmNeed($company_id , $user_mother_company_id){
        return $this->companyRepositoryinterface->confirmNeed($company_id , $user_mother_company_id);
    }

    /** Confirm Contract */
    public function confirmContract($company_id , $user_mother_company_id){
        return $this->companyRepositoryinterface->confirmContract($company_id , $user_mother_company_id);
    }


    /** Company Report */
    public function companiesReports(Request $request){
        $data = $this->companyRepositoryinterface->companiesReports($request , false , true)['companies'];
        $countries = $this->companyRepositoryinterface->companiesReports($request)['countries'];
        $sectors = $this->companyRepositoryinterface->companiesReports($request)['sectors'];
        $representatives= $this->companyRepositoryinterface->companiesReports($request)['representatives'];
        $mother_companies = $this->companyRepositoryinterface->companiesReports($request)['mother_companies'];

        if ($request->ajax()) {
            //dd($request->mother_company_id);
            $data_json['viewBlade'] = view('system.reports.company_report_partial')
                ->with(['data' => $data])->render();
            $data_json['count'] = $data['count'];
            return response()->json($data_json);

            //return view('system.reports.company_report_partial',compact('data'))->render();
        }
        return view('system.reports.company_report',compact('data','countries','sectors' , 'representatives' , 'mother_companies'));
    }


    public function extractCompanyReportExcel(Request $request)
    {
        $companies= $this->companyRepositoryinterface->companiesReports($request,true , true)['companies'];

        return Excel::download(new companiesReport($companies), 'CompanyReportExcel.xlsx');
    }

    public function print_show_company($company_id)
    {
        $company = Company::findOrFail($company_id);
        $sales_team_lead_reports = $company->salesLeadReports()->limit(3)->orderBy('created_at' , 'desc')->get();
//        dd($company);

        $pdf = Pdf::loadView('system.companies.company_pdf' , compact('company' , 'sales_team_lead_reports'));

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



    public function agreement(){
        $pdf = pdf::loadView('system.pdf.agreement');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "agreement.pdf'"]);
    }

    public function agreement_service_fnrco(){
        $pdf = pdf::loadView('system.pdf.Agreement_Service_fnrco');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "agreement_service_fnrco.pdf'"]);
    }

    public function invoice(){
        $pdf = pdf::loadView('system.pdf.invoice');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "invoice.pdf'"]);
    }

    public function sales_quotation(){
        $pdf = pdf::loadView('system.pdf.Sales_Quotation');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "sales/quotation.pdf'"]);
    }

    public function undertakeing_opal(){
        $pdf = pdf::loadView('system.pdf.Undertakeing-OPAL');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "undertakeing_opal.pdf'"]);
    }

}
