<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyQuotationRepositoryInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $companyQuotationRepositoryinterface;

    public function __construct(CompanyQuotationRepositoryInterface $companyQuotationRepositoryinterface)
    {
        $this->companyQuotationRepositoryinterface = $companyQuotationRepositoryinterface;
    }

    public function index($company_id)
    {
        //return $this->companyQuotationRepositoryinterface->index($company_id);
        $company = Company::findOrFail($company_id);
        //dd($company);
        return view('system.company_quotations.index')->with(['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        return view('system.company_quotations.create')->with([]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
