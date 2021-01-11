<?php

namespace App\Http\Controllers;

use App\Interfaces\FnrcoQuotationRepositoryInterface;
use App\Interfaces\LinrcoQuotationRepositoryInterface;
use App\Models\Company;
use App\Models\Country;
use App\Models\FnrcoQuotation;
use App\Models\LinrcoQuotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $LinrcoQuotationRepositoryInterface;
    protected $fnrcoQuotationRepositoryinterface;

    public function __construct(LinrcoQuotationRepositoryInterface $linrcoQuotationRepositoryinterface , FnrcoQuotationRepositoryInterface $fnrcoQuotationRepositoryinterface)
    {
        $this->LinrcoQuotationRepositoryInterface = $linrcoQuotationRepositoryinterface;
        $this->fnrcoQuotationRepositoryinterface = $fnrcoQuotationRepositoryinterface;
    }

    public function index($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1) {
            $linrco_quotations = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
            return view('system.company_quotations.linrco.index')->with(['linrco_quotations' => $linrco_quotations , 'company_id' => $company_id ,
                'company'=>$company , 'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            $fnrco_quotations = $this->fnrcoQuotationRepositoryinterface->index($company_id , $mother_company_id);
            return view('system.company_quotations.fnrco.index')->with(['fnrco_quotations' => $fnrco_quotations , 'company_id' => $company_id ,
                'company'=>$company , 'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id , $mother_company_id , $saudization = null)
    {
        $countries = Country::all();
        if ($mother_company_id == 1){
            return view('system.company_quotations.linrco.create')->with(['countries' => $countries ,
                'company_id' => $company_id ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            return view('system.company_quotations.fnrco.create')->with(['countries' => $countries ,
                'company_id' => $company_id , 'mother_company_id' => $mother_company_id , 'saudization' => $saudization]);
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
            return $this->LinrcoQuotationRepositoryInterface->store($request);
        }
        elseif ($request->mother_company_id == 2){
            return $this->fnrcoQuotationRepositoryinterface->store($request);
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
    public function edit($quotation_id , $mother_company_id)
    {
        $countries = Country::all();
        if ($mother_company_id == 1){
            $linrco_quotation = LinrcoQuotation::where('id' , $quotation_id)->with('linrcoQuotationsRequest')->first();
            return view('system.company_quotations.linrco.edit')->with(['countries' => $countries ,
                'linrco_quotation'=>$linrco_quotation ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            $fnrco_quotation = FnrcoQuotation::where('id' , $quotation_id)->with('fnrcoQuotationsRequest')->first();
            return view('system.company_quotations.fnrco.edit')->with(['countries' => $countries ,
                'fnrco_quotation'=>$fnrco_quotation , 'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quotation_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_quotation = LinrcoQuotation::where('id' , $quotation_id)->with('linrcoQuotationsRequest')->first();
            return $this->LinrcoQuotationRepositoryInterface->update($request , $linrco_quotation);
        }
        elseif ($request->mother_company_id == 2){
            $fnrco_quotation = FnrcoQuotation::where('id' , $quotation_id)->with('fnrcoQuotationsRequest')->first();
            return $this->fnrcoQuotationRepositoryinterface->update($request ,$fnrco_quotation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quotation_id , $mother_company_id)
    {   
        if ($mother_company_id == 1){
            return $this->LinrcoQuotationRepositoryInterface->destroy($quotation_id , $mother_company_id);
        }
        elseif ($mother_company_id == 2){
            return $this->fnrcoQuotationRepositoryinterface->destroy($quotation_id , $mother_company_id);
        }
    }

    public function printQuotation($quotation_id , $mother_company_id){
        if ($mother_company_id == 1){
            $linrco_quotation = LinrcoQuotation::where('id' , $quotation_id)->with('linrcoQuotationsRequest')->first();
            $pdf = Pdf::loadView('system.company_quotations.linrco.Quotation_pdf' ,compact('linrco_quotation'));
        }
        elseif ($mother_company_id == 2){
            $fnrco_quotation = FnrcoQuotation::where('id' , $quotation_id)->with('fnrcoQuotationsRequest')->first();
        
            $pdf = Pdf::loadView('system.company_quotations.fnrco.Quotation_pdf',compact('fnrco_quotation'));
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "quotation.pdf'"]);
    }

}
