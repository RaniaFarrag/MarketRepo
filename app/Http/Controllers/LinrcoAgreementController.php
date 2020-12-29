<?php

namespace App\Http\Controllers;

use App\Interfaces\LinrcoAgreementRepositoryInterface;
use App\Models\Company;
use App\Models\LinrcoAgreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class LinrcoAgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $linrcoAgreementInterface;

    public function __construct(LinrcoAgreementRepositoryInterface $linrcoAgreementInterface)
    {
        $this->linrcoAgreementInterface = $linrcoAgreementInterface;
    }

    public function index($company_id)
    {
        $linrco_agreements = $this->linrcoAgreementInterface->index($company_id);
        $company = Company::findOrFail($company_id);
        return view('system.contracts.linrco.index')->with(['linrco_agreements' => $linrco_agreements , 'company_id' => $company_id ,
            'company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        $company = Company::findOrFail($company_id);
        return view('system.contracts.linrco.create')->with(['company_id' => $company_id , 'company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->linrcoAgreementInterface->store($request);
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
    public function edit(LinrcoAgreement $linrcoAgreement)
    {
       return view('system.contracts.linrco.edit')->with(['linrcoAgreement'=>$linrcoAgreement,'company_id' => $linrcoAgreement->company_id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinrcoAgreement $linrcoAgreement)
    {
        return $this->linrcoAgreementInterface->update($request , $linrcoAgreement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinrcoAgreement $linrcoAgreement)
    {
        //dd($linrcoAgreement);
        return $this->linrcoAgreementInterface->destroy($linrcoAgreement);
    }

    public function printAgreement($agreement_id){

        $linrco_agreement = LinrcoAgreement::findOrFail($agreement_id);
        $pdf = Pdf::loadView('system.contracts.linrco.agreement_pdf' ,compact('linrco_agreement'));

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "greement.pdf'"]);
    }

}
