<?php

namespace App\Http\Controllers;

use App\Interfaces\FnrcoQuotationRepositoryInterface;
use App\Interfaces\LinrcoInvoiceRepositoryInterface;
use App\Interfaces\LinrcoQuotationRepositoryInterface;
use App\Models\Company;
use App\Models\Country;
use App\Models\FnrcoQuotation;
use App\Models\LinrcoAgreement;
use App\Models\LinrcoInvoice;
use App\Models\LinrcoQuotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $LinrcoInvoiceRepositoryInterface;
    protected $fnrcoInvoiceRepositoryinterface;

    public function __construct(LinrcoInvoiceRepositoryInterface $linrcoInvoiceRepositoryInterface)
    {
        $this->LinrcoInvoiceRepositoryInterface = $linrcoInvoiceRepositoryInterface;
        //$this->fnrcoInvoiceRepositoryinterface = $fnrcoQuotationRepositoryinterface;
    }

    public function index($agreement_id , $mother_company_id)
    {
        if ($mother_company_id == 1) {
            $linrco_invoices = $this->LinrcoInvoiceRepositoryInterface->index($agreement_id , $mother_company_id);
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company')->first();
//            dd($linrco_invoice->company->name);
            return view('system.invoices.linrco.index')->with(['linrco_invoices' => $linrco_invoices , 'agreement_id' => $agreement_id,
                'mother_company_id' => $mother_company_id , 'linrco_agreement' => $linrco_agreement]);
        }
        elseif ($mother_company_id == 2){
//            $fnrco_quotations = $this->fnrcoQuotationRepositoryinterface->index($agreement_id , $mother_company_id);
//            return view('system.invoices.fnrco.index')->with(['fnrco_quotations' => $fnrco_quotations ,
//                'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($agreement_id , $mother_company_id)
    {
        $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company')->first();
        if ($mother_company_id == 1){
            return view('system.invoices.linrco.create')->with([
                'linrco_agreement' => $linrco_agreement ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
//            return view('system.invoices.fnrco.create')->with([
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
            return $this->LinrcoInvoiceRepositoryInterface->store($request);
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
    public function edit($invoice_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return view('system.invoices.linrco.edit')->with([
                'linrco_invoice'=>$linrco_invoice ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $invoice_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return $this->LinrcoInvoiceRepositoryInterface->update($request , $linrco_invoice);
        }
        elseif ($request->mother_company_id == 2){

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoice_id , $mother_company_id)
    {   
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return $this->LinrcoInvoiceRepositoryInterface->destroy($linrco_invoice , $mother_company_id);
        }
        elseif ($mother_company_id == 2){

        }
    }

    public function printLinrcoinvoice($invoice_id , $mother_company_id){
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            $total_before_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('total_before_tax');
            $total_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('tax');
            $total_amount_after_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('total_amount_after_tax');
            $pdf = Pdf::loadView('system.invoices.linrco.linrco_invoice_pdf' ,compact('linrco_invoice' , 'total_before_tax' ,
                'total_tax' , 'total_amount_after_tax'));
        }
        elseif ($mother_company_id == 2){

        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "linrco_invoice.pdf'"]);
    }

    public function viewAllinvoices($company_id , $mother_company_id){
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1){
            $linrco_invoices = LinrcoInvoice::where('company_id' , $company_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->get();
            return view('system.invoices.linrco.view_all')->with(['linrco_invoices' => $linrco_invoices , 'company'=>$company ,
            'mother_company_id' => $mother_company_id]);
        }
    }

    public function uploadInvoice(Request $request){
        if($request->mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::findOrFail($request->linrco_invoice_id);
           return $this->LinrcoInvoiceRepositoryInterface->uploadInvoice($request , $linrco_invoice);
        }
    }

//    public function downloadInvoice($file_name){
//        return response()->file('storage/images/' . $file_name);
//    }

}
