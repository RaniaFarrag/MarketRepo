<?php

namespace App\Http\Controllers;

use App\Exports\salesLeadReport;
use App\Http\Requests\SalesLeadReportRequest;
use App\Interfaces\salesReportRepositoryInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesLeadReportController extends Controller
{

    protected $salesReportRepositoryInterface;

    public function __construct(salesReportRepositoryInterface $salesReportRepositoryInterface)
    {
        $this->salesReportRepositoryInterface = $salesReportRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request->all());
        $reports = $this->salesReportRepositoryInterface->index($request)['reports'];
        $reports_count = $this->salesReportRepositoryInterface->index($request)['count'];
        //dd($reports_count);
        $countries = $this->salesReportRepositoryInterface->index($request)['countries'];
        $representatives = $this->salesReportRepositoryInterface->index($request)['representatives'];
//        dd($representatives);
        $checkAll = $this->salesReportRepositoryInterface->index($request)['checkAll'];
        $ids = $this->salesReportRepositoryInterface->index($request)['ids'];
        //dd($reports);
        if ($request->ajax()){
            //dd(55);
            $data_json['viewBlade']= view('system.reports.sales_lead_report_partial'
                , compact('reports', 'checkAll', 'ids' , 'reports_count'))->render();
            $data_json['count']= $reports_count;
            return response()->json($data_json);

//            return view('system.reports.sales_lead_report_partial', compact('reports', 'checkAll', 'ids' , 'reports_count'))->render();
        }

        return view('system.reports.total_sales_lead_report', compact( 'reports', 'countries' , 'representatives' , 'reports_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company , $mother_company_id)
    {

        return view('system.reports.create_team_sales_lead_report', compact('company' , 'mother_company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesLeadReportRequest $request, Company $company)
    {
        return $this->salesReportRepositoryInterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show(Request $request, $company_id , $mother_company_id)
//    {
////       dd($request->all());
//       //dd($company_id);
//        $reports = $this->salesReportRepositoryInterface->show($request , $company_id , $mother_company_id)['reports'];
//        $company = Company::findOrFail($company_id);
//
//        if ($request->ajax()){
//            return view('system.reports.team_sales_lead_report_partial', compact('reports'))->render();
//        }
//        return view('system.reports.team_sales_lead_report', compact('company', 'reports' , 'mother_company_id'));
//    }


    public function show($company_id , $mother_company_id)
    {
        $company = Company::findOrFail($company_id);
        $reports = $this->salesReportRepositoryInterface->show($company , $mother_company_id);

        return view('system.reports.show_sales_lead_report_of_company', compact('company', 'reports' , 'mother_company_id'));
    }

    public function extractSalesLeadReportExcel(Request $request)
    {
//        dd($request->all());
        if ($request->type == 1) {
            $reports = $this->salesReportRepositoryInterface->index($request, true)['reports'];
            return Excel::download(new salesLeadReport($reports), 'salesLeadReportExcel.xlsx');
        }
    }

    public function visitReport(Request $request){
        $representatives = $this->salesReportRepositoryInterface->visitReport($request)['representatives'];
        $reports = $this->salesReportRepositoryInterface->visitReport($request)['reports'];
        $count = $this->salesReportRepositoryInterface->visitReport($request)['count'];

        if ($request->ajax()){
            //dd($count);
            $data_json['viewBlade']= view('system.reports.visit_report_partial'
                , compact('reports','count'))->render();
            $data_json['count']= $count;
            return response()->json($data_json);

        }

        return view('system.reports.visit_report' , compact('representatives' , 'reports' , 'count'));
    }


}
