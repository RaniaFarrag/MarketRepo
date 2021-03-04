<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyNeedRequest;
use App\Interfaces\FnrcoNeedRepositoryInterface;
use App\Interfaces\LinrcoNeedRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use App\Models\FnrcoNeed;
use App\Models\LinrcoNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyNeedController extends Controller
{
    protected $linrcoNeedRepositoryinterface;
    protected $fnrcoNeedRepositoryinterface;

    public function __construct(LinrcoNeedRepositoryInterface $linrcoNeedRepositoryinterface , FnrcoNeedRepositoryInterface $fnrcoNeedRepositoryinterface)
    {
        $this->linrcoNeedRepositoryinterface = $linrcoNeedRepositoryinterface;
        $this->fnrcoNeedRepositoryinterface = $fnrcoNeedRepositoryinterface;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View All CompanyNeed */
    public function index($company_id , $mother_company_id)
    {
//        $needs = $this->companyNeedRepositoryinterface->index($company_id);
//        $company = Company::findOrFail($company_id);
//        return view('system.companies.needs.index')->with(['needs' => $needs , 'company_id' => $company_id , 'company'=>$company]);
        //dd($mother_company_id);
        $company = Company::findOrFail($company_id);
        if (Auth::user()->hasRole('ADMIN')){
            if ($mother_company_id == 1){
                $linrco_needs = $this->linrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.linrco_needs.index')->with(['needs' => $linrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
            elseif ($mother_company_id == 2){
                $fnrco_needs = $this->fnrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.fnrco_needs.index')->with(['needs' => $fnrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => $mother_company_id]);
            }
        }

        else{
            if (Auth::user()->mother_company_id == 1){
                $linrco_needs = $this->linrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.linrco_needs.index')->with(['needs' => $linrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
            elseif (Auth::user()->mother_company_id == 2){
                $fnrco_needs = $this->fnrcoNeedRepositoryinterface->index($company_id);
                return view('system.companies.needs.fnrco_needs.index')->with(['needs' => $fnrco_needs , 'company_id' => $company_id ,
                    'company'=>$company , 'mother_company_id' => Auth::user()->mother_company_id]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create CompanyNeed */
    public function create($company_id , $mother_company_id)
    {
//        dd($mother_company_id);
        $countries = $this->linrcoNeedRepositoryinterface->create();
        $company = Company::findOrFail($company_id);

        $employeement_types = $this->linrcoNeedRepositoryinterface->getEmployeementtypes($company->sector_id);

        if ($mother_company_id == 1){
            if ($company->sector_id == 1){
                return view('system.companies.needs.linrco_needs.healthcare.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types ,
                    'company_id' => $company_id ,'mother_company_id' => $mother_company_id ,'sector_id' => $company->sector_id]);
            }
            return view('system.companies.needs.linrco_needs.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types,
                'company_id' => $company_id ,'mother_company_id' => $mother_company_id , 'sector_id' => $company->sector_id]);
        }
        elseif ($mother_company_id == 2){
            if ($company->sector_id == 1){
                return view('system.companies.needs.fnrco_needs.healthcare.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types ,
                    'company_id' => $company_id , 'mother_company_id' => $mother_company_id, 'sector_id' => $company->sector_id]);
            }
            return view('system.companies.needs.fnrco_needs.create')->with(['countries' => $countries , 'employeement_types' => $employeement_types,
                'company_id' => $company_id , 'mother_company_id' => $mother_company_id , 'sector_id' => $company->sector_id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store CompanyNeed */
    public function store(CompanyNeedRequest $request)
    {
        if ($request->mother_company_id == 1){
            return $this->linrcoNeedRepositoryinterface->store($request);
        }
        elseif ($request->mother_company_id == 2){
            return $this->fnrcoNeedRepositoryinterface->store($request);
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
    public function edit($need_id , $mother_company_id)
    {
        $countries = $this->linrcoNeedRepositoryinterface->create();

        if ($mother_company_id == 1){
            $need = LinrcoNeed::findOrFail($need_id);
            $employeement_types = $this->linrcoNeedRepositoryinterface->getEmployeementtypes($need->company->sector_id);

            if ($need->company->sector_id == 1){
                return view('system.companies.needs.linrco_needs.healthcare.edit')->with(['need' => $need , 'countries' => $countries , 'employeement_types' => $employeement_types ,
                    'company_id' => $need->company_id ,'mother_company_id' => $mother_company_id ,'sector_id' => $need->company->sector_id]);
            }
            return view('system.companies.needs.linrco_needs.edit')->with(['need' => $need , 'countries' => $countries , 'employeement_types' => $employeement_types,
                'company_id' => $need->company_id ,'mother_company_id' => $mother_company_id , 'sector_id' => $need->company->sector_id]);
        }

        elseif ($mother_company_id == 2){
            $need = FnrcoNeed::findOrFail($need_id);
            $employeement_types = $this->linrcoNeedRepositoryinterface->getEmployeementtypes($need->company->sector_id);

            if ($need->company->sector_id == 1){
                return view('system.companies.needs.fnrco_needs.healthcare.edit')->with(['need' => $need , 'countries' => $countries , 'employeement_types' => $employeement_types ,
                    'company_id' => $need->company_id , 'mother_company_id' => $mother_company_id, 'sector_id' => $need->company->sector_id]);
            }
            return view('system.companies.needs.fnrco_needs.edit')->with(['need' => $need , 'countries' => $countries , 'employeement_types' => $employeement_types,
                'company_id' => $need->company_id , 'mother_company_id' => $mother_company_id , 'sector_id' => $need->company->sector_id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit CompanyNeed */
    public function update(CompanyNeedRequest $request, $need_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_need = LinrcoNeed::findOrFail($need_id);
            return $this->linrcoNeedRepositoryinterface->update($request , $linrco_need);
        }
        elseif ($request->mother_company_id == 2){
            $fnrco_need = FnrcoNeed::findOrFail($need_id);
            return $this->fnrcoNeedRepositoryinterface->update($request , $fnrco_need);
        }
       ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Delete CompanyNeed */
    public function destroy($need_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            return $this->linrcoNeedRepositoryinterface->destroy($need_id , $mother_company_id);
        }
        elseif ($mother_company_id == 2){
            return $this->fnrcoNeedRepositoryinterface->destroy($need_id , $mother_company_id);
        }
    }

    public function printNeed($need_id , $mother_company_id){

        if ($mother_company_id == 1){
            $need = LinrcoNeed::findOrFail($need_id);
            if($need->company->sector_id == 1){
                $pdf = Pdf::loadView('system.companies.needs.linrco_needs.healthcare.healthcare_need_pdf' , compact('need'));
            }
            else{
                $pdf = Pdf::loadView('system.companies.needs.linrco_needs.need_pdf' , compact('need'));
            }
        }
        elseif ($mother_company_id == 2){
            $need = FnrcoNeed::findOrFail($need_id);
            if($need->company->sector_id == 1){
                $pdf = Pdf::loadView('system.companies.needs.fnrco_needs.healthcare.healthcare_need_pdf' , compact('need'));
            }
            else{
                $pdf = Pdf::loadView('system.companies.needs.fnrco_needs.need_pdf' , compact('need'));
            }
        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "company_need.pdf'"]);
    }
}
