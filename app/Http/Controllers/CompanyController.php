<?php

namespace App\Http\Controllers;

use App\Exports\companiesReport;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyUser;
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
        $this->middleware('permission:Add Company', ['only' => ['store','create']]);
        $this->middleware('permission:Edit Company', ['only' => ['update','edit']]);
        $this->middleware('permission:Delete Company', ['only' => ['destroy']]);

        $this->middleware('permission:Confirm Connection', ['only' => ['confirmConnected']]);
        $this->middleware('permission:Confirm Interview', ['only' => ['confirmInterview']]);
        $this->middleware('permission:Confirm Need', ['only' => ['confirmNeed']]);
        $this->middleware('permission:Confirm Contract', ['only' => ['confirmContract']]);

        $this->middleware('permission:print company', ['only' => ['print_show_company']]);
    }

    /** View All companies */
    public function index(Request $request)
    {
//        $this->middleware('permission:Delete Company');
        $data = $this->companyRepositoryinterface->companiesReports_all($request)['companies'];
        //dd($data);
        $sectors = $this->companyRepositoryinterface->companiesReports_all($request)['sectors'];
        $countries = $this->companyRepositoryinterface->companiesReports_all($request)['countries'];
        $representatives = $this->companyRepositoryinterface->companiesReports_all($request)['representatives'];
        $mother_companies = $this->companyRepositoryinterface->companiesReports_all($request)['mother_companies'];

        if($request->ajax()){
            if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')){
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
    public function show($company_id)
    {
       //
    }

    public function showCompany($company_id , $mother_company_id)
    {
        //$company = Company::findOrFail($company_id);
        $company = Company::where('id' , $company_id)->with(['representative' => function($q) use ($mother_company_id){
            $q->where('company_user.mother_company_id' , $mother_company_id);
        }])->first();
        //dd($company);

        return view ('system.companies.show')->with(['company' => $company , 'mother_company_id' => $mother_company_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Edit Company */
    public function edit($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);

        $data = $this->companyRepositoryinterface->edit($company);
        if($company->representative){
           $company_user = CompanyUser::where('company_id' , $company_id)->where('mother_company_id' , $mother_company_id)->first();
            return view('system.companies.edit')->with(['company' => $company , 'data' => $data ,
                'mother_company_id'=>$mother_company_id , 'company_user' => $company_user]);
        }
        return view('system.companies.edit')->with(['company' => $company , 'data' => $data ,
            'mother_company_id'=>$mother_company_id]);
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
        $data = $this->companyRepositoryinterface->companiesReports($request , false , true)['companies_user'];
        //dd($data['companies_user'][0]);
        $countries = $this->companyRepositoryinterface->companiesReports($request)['countries'];
        $sectors = $this->companyRepositoryinterface->companiesReports($request)['sectors'];
        $representatives= $this->companyRepositoryinterface->companiesReports($request)['representatives'];
        $mother_companies = $this->companyRepositoryinterface->companiesReports($request)['mother_companies'];
        //dd($representatives);
        if ($request->ajax()) {
            if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')|| Auth::user()->hasRole('Assistant G.Manger')){
                $mother_company_id = $request->mother_company_id;
            }
            else{
                $mother_company_id = Auth::user()->mother_company_id;
            }

            $data_json['viewBlade'] = view('system.reports.company_report_partial')
                ->with(['data' => $data , 'mother_company_id'=>$mother_company_id])->render();
            $data_json['count'] = $data['count'];
            return response()->json($data_json);

            //return view('system.reports.company_report_partial',compact('data'))->render();
        }
        return view('system.reports.company_report',compact('data','countries','sectors' , 'representatives' , 'mother_companies'));
    }


    public function extractCompanyReportExcel(Request $request)
    {
        $companies= $this->companyRepositoryinterface->companiesReports($request,true , true)['companies_user'];

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
