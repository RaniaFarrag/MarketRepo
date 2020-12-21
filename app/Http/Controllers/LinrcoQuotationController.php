<?php

namespace App\Http\Controllers;

use App\Interfaces\LinrcoQuotationRepositoryInterface;
use App\Models\Company;
use Illuminate\Http\Request;

class LinrcoQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $linrcoQuotationRepositoryinterface;

    public function __construct(LinrcoQuotationRepositoryInterface $linrcoQuotationRepositoryinterface)
    {
        $this->linrcoQuotationRepositoryinterface = $linrcoQuotationRepositoryinterface;
    }

    public function index($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if (Auth::user()->hasRole('ADMIN')) {
            if ($mother_company_id == 1) {
                $linrco_quotation = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.companies_quotations.linrco.index')->with(['linrco_quotation' => $linrco_quotation , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_quotation = $this->LinrcoQuotationRepositoryInterface->index($company_id , $mother_company_id);
                return view('system.companies_quotations.fnrco.index')->with(['fnrco_quotation' => $fnrco_quotation , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
        }
        //$quotations  = $this->linrcoQuotationRepositoryinterface->index($company_id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
