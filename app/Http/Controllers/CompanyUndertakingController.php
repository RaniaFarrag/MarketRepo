<?php

namespace App\Http\Controllers;

use App\Interfaces\LinrcoUndertakingRepositoryInterface;
use App\Models\Company;
use App\Models\FnrcoQuotation;
use App\Models\LinrcoQuotation;
use App\Models\LinrcoUndertaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyUndertakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $linrcoUndertakingRepositoryInterface;
    protected $fnrcoUndertakingRepositoryinterface;

    public function __construct(LinrcoUndertakingRepositoryInterface $linrcoUndertakingRepositoryinterface)
    {
        $this->linrcoUndertakingRepositoryInterface = $linrcoUndertakingRepositoryinterface;
    }

    public function index($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1) {
            $linrco_undertakings = $this->linrcoUndertakingRepositoryInterface->index($company_id , $mother_company_id);
            return view('system.company_undertaking.linrco.index')->with(['linrco_undertakings' => $linrco_undertakings , 'company_id' => $company_id ,
                'company'=>$company , 'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            $fnrco_undertaking = $this->fnrcoQuotationRepositoryinterface->index($company_id , $mother_company_id);
            return view('system.company_undertaking.fnrco.index')->with(['fnrco_undertaking' => $fnrco_undertaking , 'company_id' => $company_id ,
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
            return view('system.company_undertaking.linrco.create')->with(['company_id' => $company_id , 'company'=>$company ,
                'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            return view('system.company_undertaking.fnrco.create')->with(['company_id' => $company_id , 'company'=>$company ,
                'mother_company_id' => $mother_company_id]);
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
            return $this->linrcoUndertakingRepositoryInterface->store($request);
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
    public function edit($undertaking_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_undertaking = LinrcoUndertaking::where('id' , $undertaking_id)->with('company')->first();
            return view('system.company_undertaking.linrco.edit')->with(['linrco_undertaking'=>$linrco_undertaking,
                'company_id' => $linrco_undertaking->company_id ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
            $fnrco_undertaking = FnrcoQuotation::where('id' , $undertaking_id)->with('fnrcoQuotationsRequest')->first();
            return view('system.company_undertaking.fnrco.edit')->with(['fnrco_undertaking'=>$fnrco_undertaking ,
                'company_id' => $fnrco_undertaking->company_id , 'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $undertaking_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_undertaking = LinrcoUndertaking::where('id' , $undertaking_id)->with('company')->first();
            return $this->linrcoUndertakingRepositoryInterface->update($request , $linrco_undertaking);
        }
        elseif ($request->mother_company_id == 2){
//            $linrco_undertaking = FnrcoUndertaking::where('id' , $undertaking_id)->with('company')->first();
//            return $this->fnrcoQuotationRepositoryinterface->update($request , $linrco_undertaking);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($undertaking_id , $mother_company_id)
    {   
        if ($mother_company_id == 1){
            $linrco_undertaking = LinrcoUndertaking::where('id' , $undertaking_id)->with('company')->first();
            return $this->linrcoUndertakingRepositoryInterface->destroy($linrco_undertaking , $mother_company_id);
        }
        elseif ($mother_company_id == 2){
            //return $this->fnrcoQuotationRepositoryinterface->destroy($ , $mother_company_id);
        }
    }

    public function printUndertaking($undertaking_id , $mother_company_id){
        if ($mother_company_id == 1){
            $linrco_undertaking = LinrcoUndertaking::where('id' , $undertaking_id)->with('company')->first();
            $pdf = Pdf::loadView('system.company_undertaking.linrco.Undertakeing-OPAL' ,compact('linrco_undertaking'));
        }
        elseif ($mother_company_id == 2){
            $fnrco_undertaking = FnrcoQuotation::where('id' , $undertaking_id)->with('fnrcoQuotationsRequest')->first();
        
            $pdf = Pdf::loadView('system.company_undertaking.fnrco.Undertakeing-OPAL',compact('fnrco_undertaking'));
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "undertaking.pdf'"]);
    }

}
