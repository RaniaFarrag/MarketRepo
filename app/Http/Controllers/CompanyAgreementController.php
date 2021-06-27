<?php

namespace App\Http\Controllers;

use App\Interfaces\FnrcoAgreementRepositoryInterface;
use App\Interfaces\LinrcoAgreementRepositoryInterface;
use App\Models\AgreementReport;
use App\Models\Company;
use App\Models\FnrcoAgreement;
use App\Models\FnrcoFlatRedAgreement;
use App\Models\FnrcoFlatRedQuotation;
use App\Models\FnrcoQuotation;
use App\Models\LinrcoAgreement;
use App\Models\MotherCompany;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyAgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $LinrcoAgreementRepositoryInterface;
    protected $fnrcoAgreementRepositoryinterface;

    public function __construct(LinrcoAgreementRepositoryInterface $linrcoAgreementRepositoryInterface , FnrcoAgreementRepositoryInterface $fnrcoAgreementRepositoryInterface)
    {
        $this->LinrcoAgreementRepositoryInterface = $linrcoAgreementRepositoryInterface;
        $this->fnrcoAgreementRepositoryinterface = $fnrcoAgreementRepositoryInterface;
    }

    public function index($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1) {
            $linrco_agreements = $this->LinrcoAgreementRepositoryInterface->index($company_id , $mother_company_id);
            return view('system.agreement_contract.linrco.index')->with(['linrco_agreements' => $linrco_agreements , 'company_id' => $company_id ,
                'company'=>$company , 'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            $data = $this->fnrcoAgreementRepositoryinterface->index($company_id , $mother_company_id);
            return view('system.agreement_contract.fnrco.viewAll')->with(['data' => $data , 'company_id' => $company_id ,
                'company'=>$company , 'mother_company_id' => $mother_company_id]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1){
            return view('system.agreement_contract.linrco.create')->with(['company_id' => $company_id , 'company'=>$company,
                'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
//            return view('system.agreement_contract.linrco.create')->with(['company'=>$company,
//                'company_id' => $company_id , 'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->mother_company_id == 1){
            return $this->LinrcoAgreementRepositoryInterface->store($request);
        }
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
    public function edit($agreement_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            return view('system.agreement_contract.linrco.edit')->with(['linrco_agreement' => $linrco_agreement ,
                'mother_company_id' => $mother_company_id]);
        }
        // ٌReadyMan Power
        elseif ($mother_company_id == 2){
            $fnrco_agreement = FnrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            return view('system.agreement_contract.fnrco.edit')->with(['fnrco_agreement'=>$fnrco_agreement ,
                'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agreement_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            return $this->LinrcoAgreementRepositoryInterface->update($request , $linrco_agreement);
        }
        // ٌReadyMan Power
        elseif ($request->mother_company_id == 2){
            $fnrco_agreement = FnrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            return $this->fnrcoAgreementRepositoryinterface->update($request ,$fnrco_agreement);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($agreement_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            return $this->LinrcoAgreementRepositoryInterface->destroy($linrco_agreement , $mother_company_id);
        }
        // ٌReadyMan Power
        elseif ($mother_company_id == 2){
            $fnrco_agreement = FnrcoAgreement::where('id' , $agreement_id)->first();
            return $this->fnrcoAgreementRepositoryinterface->destroy($fnrco_agreement , $mother_company_id);
        }
    }

    // ٌLinrco
    public function printAgreement($agreement_id , $mother_company_id){
        if ($mother_company_id == 1){
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            $pdf = Pdf::loadView('system.agreement_contract.linrco.linrco_agreement_pdf' ,compact('linrco_agreement'));
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "agreement.pdf'"]);
    }


    /*********************************************FNRCO READYMAN POWER Agreements*****************************************************/

    public function convertFnrcoquotationToAgreement($quotation_id){
        $quotation = FnrcoQuotation::findOrFail($quotation_id);
        $this->fnrcoAgreementRepositoryinterface->convertFnrcoquotationToAgreement($quotation_id);
//        dd($agreement->fnrcoQuotation);
        Alert::success('success', trans('dashboard.The quotation has been converted to a contract successfully'));
        return redirect(route('companyQuotation.index' , [$quotation->company_id , 2]));
    }

    public function openFnrcoAgreement($fnrco_agreement_id){
        $agreement = FnrcoAgreement::where('id' , $fnrco_agreement_id)->with('fnrcoQuotation')->first();

        return view('system.agreement_contract.fnrco.index')->with(['agreement' => $agreement]);
    }

    public function printFnrcoAgreement($fnrco_agreement_id){
        $fnrco_agreement = FnrcoAgreement::where('id' , $fnrco_agreement_id)->with('company' , 'user' , 'fnrcoQuotation')->first();
//        dd($fnrco_agreement->fnrcoQuotation->fnrcoQuotationsRequest->sum('total_value_per_month'));
        $total = $fnrco_agreement->fnrcoQuotation->fnrcoQuotationsRequest->sum('total_value_per_month');
        if($fnrco_agreement->fnrcoQuotation->saudization == 1){ //Ageer
            $pdf = Pdf::loadView('system.agreement_contract.fnrco.Agreement_Ageer_fnrco' ,compact('fnrco_agreement' , 'total'));
        }
        else{
            $pdf = Pdf::loadView('system.agreement_contract.fnrco.Agreement_Service_fnrco' ,compact('fnrco_agreement' , 'total'));
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "agreement.pdf'"]);
    }

//    public function deleteFnrcoAgreement($agreement_id , $mother_company_id)
//    {
//        $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
//        return $this->LinrcoAgreementRepositoryInterface->destroy($linrco_agreement , $mother_company_id);
//    }

    /*********************************************FNRCO VISA FlatRed Agreements**********************************************/

    public function convertFnrcoFlatRedQuotationToAgreement($quotation_id){
        $quotation = FnrcoFlatRedQuotation::findOrFail($quotation_id);
        $this->fnrcoAgreementRepositoryinterface->convertFnrcoFlatRedQuotationToAgreement($quotation);

        Alert::success('success', trans('dashboard.The quotation has been converted to a contract successfully'));
        return redirect(route('companyQuotation.index' , [$quotation->company_id , 2]));
    }

    public function openFlatRedAgreement($flatred_agreement_id){
        $flat_red_agreement = FnrcoFlatRedAgreement::where('id' , $flatred_agreement_id)->with('fnrcoFlatRedQuotation')->first();

        return view('system.agreement_contract.fnrco.Flat_Red.index')->with('flat_red_agreement' , $flat_red_agreement);
    }

    public function editFlatRedAgreement($flatred_agreement_id , $mother_company_id){
        $flatred_agreement = FnrcoFlatRedAgreement::where('id' , $flatred_agreement_id)->with('agreementFlatRedAnnexure','company' , 'user')->first();
        //dd(json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[0]);
        return view('system.agreement_contract.fnrco.Flat_Red.edit')->with(['flatred_agreement' => $flatred_agreement ,
            'mother_company_id'=>$mother_company_id]);
    }

    public function updateFlatRedAgreement(Request $request, $flatagreement_id){
        $flatred_agreement = FnrcoFlatRedAgreement::where('id' , $flatagreement_id)->with('agreementFlatRedAnnexure','company' , 'user')->first();

        return $this->fnrcoAgreementRepositoryinterface->updateFlatRedAgreement($request ,$flatred_agreement);
    }

    public function flatRedAgeerAgreementprint($flatagreement_id){
        $fnrco_flat_red_agreement = FnrcoFlatRedAgreement::where('id' , $flatagreement_id)->with('agreementFlatRedAnnexure' ,
            'fnrcoFlatRedQuotation' , 'company' , 'user')->first();
        $total_quantity = $fnrco_flat_red_agreement->fnrcoFlatRedQuotation->fnrcoFlatRedQuotationRequests->sum('quantity');
        $total_amount = $fnrco_flat_red_agreement->fnrcoFlatRedQuotation->fnrcoFlatRedQuotationRequests->sum('total_value_per_month');

        if ($fnrco_flat_red_agreement->fnrcoFlatRedQuotation->saudization == 1){
            $pdf = Pdf::loadView('system.agreement_contract.fnrco.Flat_Red.ageer_pdf' , compact('fnrco_flat_red_agreement' ,
                'total_quantity' , 'total_amount'));
        }
        else{
            $pdf = Pdf::loadView('system.agreement_contract.fnrco.Flat_Red.service_pdf' , compact('fnrco_flat_red_agreement' ,
                'total_quantity' , 'total_amount'));
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "FlatRed_agreement.pdf'"]);
    }

    public function deleteflatRedAgreement($flatagreement_id , $mother_company_id){
        $flatred_agreement = FnrcoFlatRedAgreement::where('id' , $flatagreement_id)->first();
        return $this->fnrcoAgreementRepositoryinterface->deleteflatRedAgreement($flatred_agreement , $mother_company_id);
    }

    /*****************************************************REPORT*****************************************************************/

    public function getAgreementReport(Request $request){
        $mother_companies = MotherCompany::all();

        $companies = $this->getAgreementReportAjax($request)['companies'];
        $representatives = $this->getAgreementReportAjax($request)['representatives'];
        $agreement_reports = $this->getAgreementReportAjax($request)['agreement_reports'];
        $count = $this->getAgreementReportAjax($request)['count'];

        if ($request->ajax()){
            $data_json['viewBlade']= view('system.agreement_contract.agreement_report_partial'
                , compact('agreement_reports' , 'count'))->render();
            $data_json['count']= $count;
            return response()->json($data_json);
        }

        return view('system.agreement_contract.agreement_report' , compact('mother_companies' , 'companies' ,
        'representatives' , 'agreement_reports' , 'count'));

    }

    public function getAgreementReportAjax($request){
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')){
            $companies = Company::all();
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
            $agreement_reports = AgreementReport::query();
        }
        elseif (Auth::user()->hasRole('Sales Manager')){
            $companies = Company::WhereIn('sector_id', Auth::user()->sectors->pluck('id'))->get();
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id);
                })->get();
            $agreement_reports = AgreementReport::whereIn('user_id' , Auth::user()->childs->pluck('id'));
        }
        elseif (Auth::user()->hasRole('Sales Representative')){
            $companies = Auth::user()->assignedCompanies()->get();
            $representatives = User::where('active' , 1)->where('id' , Auth::user()->id)->get();

            $agreement_reports = AgreementReport::where('user_id' , Auth::user()->id)->orderBy('id' , 'desc');
        }

        if ($request->mother_company_id)
            $agreement_reports->where('mother_company_id' , $request->mother_company_id);

        if ($request->company_id){
            $agreement_reports->where('company_id' , $request->company_id);
        }

        if ($request->user_id){
            $agreement_reports->where('user_id' , $request->user_id);
        }

        if ($request->contract_status){
            $agreement_reports->where('contract_status' , $request->contract_status);
        }

        if ($request->from){
            $agreement_reports->where('date' , '>=' , $request->from);
        }

        if ($request->to){
            $agreement_reports->where('date' , '<=' , $request->to);
        }

        $data['companies'] = $companies;
        $data['representatives'] = $representatives;
        $data['agreement_reports'] = $agreement_reports->get();
        $data['count'] = $agreement_reports->count();

        return $data;
    }

    public function createAgreementReport(){
        if (Auth::user()->hasRole('Sales Representative')){
            $companies = Auth::user()->assignedCompanies()->get();
        }
        return view('system.agreement_contract.create_agreement_report' , compact( 'companies'));
    }

    public function storeAgreementReport(Request $request){
        AgreementReport::create([
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
            'mother_company_id' => Auth::user()->mother_company_id,
            'contract_status' => $request->contract_status,
            'date' => $request->date,
            'feedback' => $request->feedback,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('get_agreement_report'));
    }

    public function editAgreementReport($agreement_report_id){
        $agreement_report = AgreementReport::findOrFail($agreement_report_id);
        if (Auth::user()->hasRole('Sales Representative')){
            $companies = Auth::user()->assignedCompanies()->get();
        }
        return view('system.agreement_contract.edit_agreement_report' , compact( 'companies' ,
            'agreement_report'));
    }

    public function updateAgreementReport(Request $request , $agreement_report_id){
        $agreement_report = AgreementReport::findOrFail($agreement_report_id);
        $agreement_report->update([
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
            'mother_company_id' => Auth::user()->mother_company_id,
            'contract_status' => $request->contract_status,
            'date' => $request->date,
            'feedback' => $request->feedback,
        ]);

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('get_agreement_report'));
    }

    public function exportExcelAgreementReport(Request $request){
        $agreement_reports = $this->getAgreementReportAjax($request)['agreement_reports'];
        return Excel::download(new \App\Exports\AgreementReport($agreement_reports), 'AgreementReportExcel.xlsx');
    }

}
