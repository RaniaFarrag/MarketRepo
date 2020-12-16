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
            //dd($reports_count);

        return view('system.reports.total_sales_lead_report', compact( 'reports', 'countries' , 'representatives' , 'reports_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('system.reports.create_team_sales_lead_report', compact('company'));
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
    public function show(Request $request, Company $company)
    {
        $reports = $this->salesReportRepositoryInterface->index($request)['reports'];

        if ($request->ajax())
            return view('system.reports.sales_lead_report_partial', compact('reports'))->render();

        return view('system.reports.team_sales_lead_report', compact('company', 'reports'));
    }

    public function extractSalesLeadReportExcel(Request $request)
    {
//        dd($request->all());
        if ($request->type == 1) {
            $reports = $this->salesReportRepositoryInterface->index($request, true)['reports'];
            return Excel::download(new salesLeadReport($reports), 'salesLeadReportExcel.xlsx');
        }
    }


}
