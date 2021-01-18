<?php

namespace App\Http\Controllers;

use App\Interfaces\FnrcoAgreementRepositoryInterface;
use App\Interfaces\LinrcoAgreementRepositoryInterface;
use App\Models\Company;
use App\Models\FnrcoAgreement;
use App\Models\FnrcoQuotation;
use App\Models\LinrcoAgreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        elseif ($request->mother_company_id == 2){
            //return $this->fnrcoQuotationRepositoryinterface->store($request);
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
        elseif ($mother_company_id == 2){
//            $fnrco_quotation = FnrcoQuotation::where('id' , $quotation_id)->with('fnrcoQuotationsRequest')->first();
//            return view('system.company_quotations.fnrco.edit')->with(['countries' => $countries ,
//                'fnrco_quotation'=>$fnrco_quotation , 'mother_company_id' => $mother_company_id]);
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
        elseif ($request->mother_company_id == 2){
//            $fnrco_quotation = FnrcoQuotation::where('id' , $quotation_id)->with('fnrcoQuotationsRequest')->first();
//            return $this->fnrcoQuotationRepositoryinterface->update($request ,$fnrco_quotation);
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
        elseif ($mother_company_id == 2){
//            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company' , 'user')->first();
            //return $this->fnrcoQuotationRepositoryinterface->destroy($agreement_id);
        }
    }

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


    /*********************************************FNRCO COMPANy*****************************************************/


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
        $pdf = Pdf::loadView('system.agreement_contract.fnrco.Agreement_Service_fnrco' ,compact('fnrco_agreement' , 'total'));

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "agreement.pdf'"]);
    }

}
