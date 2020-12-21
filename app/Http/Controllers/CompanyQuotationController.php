<?php

namespace App\Http\Controllers;

use App\Interfaces\FnrcoQuotationRepositoryInterface;
use App\Interfaces\LinrcoQuotationRepositoryInterface;
use App\Models\Company;
use App\Models\Country;
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

    public function __construct(LinrcoQuotationRepositoryInterface $linrcoQuotationRepositoryinterface)
    {
        $this->LinrcoQuotationRepositoryInterface = $linrcoQuotationRepositoryinterface;
        //$this->fnrcoNeedRepositoryinterface = $fnrcoNeedRepositoryinterface;
    }

    public function index($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if (Auth::user()->hasRole('ADMIN')) {
            if ($mother_company_id == 1) {
                $linrco_quotations = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.company_quotations.linrco.index')->with(['linrco_quotations' => $linrco_quotations , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_quotation = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.company_quotations.fnrco.index')->with(['fnrco_quotation' => $fnrco_quotation , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
        }

        else{
            if (Auth::user()->mother_company_id == 1) {
                $linrco_quotations = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.company_quotations.linrco.index')->with(['linrco_quotations' => $linrco_quotations , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_quotation = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.company_quotations.fnrco.index')->with(['fnrco_quotation' => $fnrco_quotation , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id , $mother_company_id)
    {
        $countries = Country::all();

        if ($mother_company_id == 1){
            return view('system.company_quotations.linrco.create')->with(['countries' => $countries ,
                'company_id' => $company_id ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            return view('system.company_quotations.fnrco.create')->with(['countries' => $countries ,
                'company_id' => $company_id , 'mother_company_id' => $mother_company_id]);
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
        dd($request->all());
        if ($request->mother_company_id == 1){
            return $this->LinrcoQuotationRepositoryInterface->store($request);
        }
        elseif ($request->mother_company_id == 2){
            return $this->FnrcoQuotationRepositoryInterface->store($request);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printQuotation(){
        //$quotation = CompanyNeed::findOrFail($quotation_id);

//        if($quotation->company->sector_id == 1){
//            $pdf = Pdf::loadView('system.companies.needs.healthcare.healthcare_need_pdf' , compact('need'));
//        }
//        else{
//            $pdf = Pdf::loadView('system.companies.needs.need_pdf' , compact('need'));
//        }

        $pdf = Pdf::loadView('system.company_quotations.Quotation_pdf');

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "quotation.pdf'"]);
    }

}
