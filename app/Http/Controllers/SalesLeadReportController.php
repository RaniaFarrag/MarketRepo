<?php

namespace App\Http\Controllers;

use App\Exports\salesLeadReport;
use App\Exports\SalesPipelineReport;
use App\Exports\VisitReport;
use App\Http\Requests\SalesLeadReportRequest;
use App\Interfaces\salesReportRepositoryInterface;
use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\CompanyRequest;
use App\Models\CompanyUser;
use App\Models\MotherCompany;
use App\Models\SalesPipeline;
use App\Models\SalesPipelineHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

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
        return $this->salesReportRepositoryInterface->store($request , $company);
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

    public function edit($report_id , $mother_company_id)
    {
        $report = Company_sales_lead_report::findOrFail($report_id);

        return view('system.reports.edit_team_sales_lead_report', compact('report', 'mother_company_id'));
    }

    public function updateCompanySalesTeamReports(SalesLeadReportRequest $request , $report_id)
    {
        $report = Company_sales_lead_report::findOrFail($report_id);

        return $this->salesReportRepositoryInterface->updateCompanySalesTeamReports($request , $report);
    }

    public function extractSalesLeadReportExcel(Request $request)
    {
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
            $data_json['viewBlade']= view('system.reports.visit_report_partial'
                , compact('reports','count'))->render();
            $data_json['count']= $count;
            return response()->json($data_json);
        }
        //dd($reports);
        return view('system.reports.visit_report' , compact('representatives' , 'reports' , 'count'));
    }

    public function exportVisitreport(Request $request){
        $reports = $this->salesReportRepositoryInterface->visitReport($request)['reports'];
        return Excel::download(new VisitReport($reports), 'visitReportExcel.xlsx');
    }

    public function getSalesReportdetails($report_id){
        $sales_report = $this->salesReportRepositoryInterface->getSalesReportdetails($report_id);

        return view('system.reports.sales_report_details')->with('sales_report' , $sales_report);
    }



    public function getSalesPipeline(Request $request){
        $mother_companies = MotherCompany::all();

        $representatives = $this->getSalesPipelineAjax($request)['representatives'];
        $sales_pipeline_report = $this->getSalesPipelineAjax($request)['sales_pipeline_report'];
        $count = $this->getSalesPipelineAjax($request)['count'];
        $sum_total_volume = $this->getSalesPipelineAjax($request)['sum_total_volume'];

        if ($request->ajax()){
            $data_json['viewBlade']= view('system.sales_pipline.report_partial'
                , compact('sales_pipeline_report'))->render();
            $data_json['count']= $count;
            $data_json['sum_total_volume']= $sum_total_volume;
            return response()->json($data_json);
        }

        return view('system.sales_pipline.report' , compact('sales_pipeline_report' ,'count', 'sum_total_volume',
            'representatives' , 'mother_companies'));
    }

    public function getSalesPipelineAjax($request){
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator') || Auth::user()->hasRole('Assistant G.Manger')){
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id');
                })->get();
            $sales_pipeline_report = SalesPipeline::with(['history' => function($query){
                $query->latest();
            }])->orderBy('id' , 'desc');
        }

        elseif(Auth::user()->hasRole('Sales Manager')){
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id);
                })->get();
            $sales_pipeline_report = SalesPipeline::whereIn('user_id' , Auth::user()->childs->pluck('id'))
                ->with(['history' => function($query){
                    $query->latest();
                }])->orderBy('id' , 'desc');
        }

        else{
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();
            $sales_pipeline_report = SalesPipeline::where('user_id' , Auth::user()->id)
                ->with(['history' => function($query){
                    $query->latest();
                }])->orderBy('id' , 'desc');
        }

        if ($request->mother_company_id)
            $sales_pipeline_report->where('mother_company_id' , $request->mother_company_id);

        if ($request->representative_id){
            $sales_pipeline_report->where('user_id' , $request->representative_id);
        }

        if ($request->contract_type){
            $sales_pipeline_report->where('contract_type' , $request->contract_type);
        }

        if ($request->from){
            $sales_pipeline_report->where('date' , '>=' , $request->from);
        }

        if ($request->to){
            $sales_pipeline_report->where('date' , '<=' , $request->to);
        }

        if (isset($request->evaluation_ids) && count($request->evaluation_ids) > 0){
            $sales_pipeline_report->whereHas('companyUser' , function ($q) use ($request){
                $q->whereIn('evaluation_status' , $request->evaluation_ids);
            });
        }

        $data['sales_pipeline_report'] = $sales_pipeline_report->get();
        //dd($data['sales_pipeline_report'][5]->history[0]->total_volume);

        $sum_total_volume = 0;
        foreach ($data['sales_pipeline_report'] as $report){
            if (count($report->history) > 0){

                $sum_total_volume += $report->history[0]->total_volume;
            }
            else{
                $sum_total_volume += 0;
            }

            $company_user = CompanyUser::findOrFail($report->company_user_id);

            if ($company_user)
                $report['status'].= $company_user->evaluation_status;
        }

        $data['representatives'] = $representatives;
        $data['count'] = $sales_pipeline_report->count();
        $data['sum_total_volume'] = $sum_total_volume;

        return $data;

    }

    public function createSalesPipeline(){
        $companies = Auth::user()->assignedCompanies()->get();
        return view('system.sales_pipline.create' , compact('companies'));
    }

    public function storeSalesPipeline(Request $request){
        $company_user = CompanyUser::where('company_id' , $request->company_id)->where('user_id' , Auth::user()->id)
            ->where('mother_company_id' , Auth::user()->mother_company_id)->first();

        SalesPipeline::create([
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
            'company_user_id' => $company_user->id,
            'mother_company_id' => Auth::user()->mother_company_id,
            'date' => $request->date,
            'total_volume' => $request->total_volume,
            'contract_type' => $request->contract_type,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('sales_pipeline'));
    }

    public function editSalesPipeline($report_id){
        $companies = Auth::user()->assignedCompanies()->get();
        $report = SalesPipeline::findOrFail($report_id);
        return view('system.sales_pipline.edit' , compact('companies' , 'report'));
    }

    public function updateSalesPipeline(Request $request , $report_id){
        $report = SalesPipeline::findOrFail($report_id);

        $report->update([
            'company_id' => $request->company_id,
            'date' => $request->date,
            'total_volume' => $request->total_volume,
            'contract_type' => $request->contract_type,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('sales_pipeline'));
    }

    public function showHistoryofSalesPipeline($sales_pipeline_id){
        $history = SalesPipelineHistory::where('sales_pipeline_id' , $sales_pipeline_id)->orderBy('id' , 'desc')->get();
        return view('system.sales_pipline.show_history_of_sales_pipeline_report' , compact('history' , 'sales_pipeline_id'));
    }

    public function createHistoryofSalesPipeline($sales_pipeline_id){
        return view('system.sales_pipline.create_history_of_sales_pipeline' ,
            compact( 'sales_pipeline_id'));
    }

    public function storeHistoryofSalesPipeline(Request $request){
        SalesPipelineHistory::create([
            'sales_pipeline_id' => $request->sales_pipeline_id ,
            'date' => $request->date,
            'total_volume' => $request->total_volume,
            'forecast' => $request->forecast,
            'comments' => $request->comments,
            'project_closing_month' => $request->project_closing_month,
            'project_closing_year' => $request->project_closing_year,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('show_history_sales_pipeline' , $request->sales_pipeline_id));
    }

    public function editHistoryofSalesPipeline($history_id){
        $history = SalesPipelineHistory::findOrFail($history_id);
        return view('system.sales_pipline.edit_history_of_sales_pipeline' ,
            compact( 'history'));

    }

    public function updateHistoryofSalesPipeline(Request $request , $history_id){
        $history = SalesPipelineHistory::findOrFail($history_id);

        $history->update([
            'date' => $request->date,
            'total_volume' => $request->total_volume,
            'forecast' => $request->forecast,
            'comments' => $request->comments,
            'project_closing_month' => $request->project_closing_month,
            'project_closing_year' => $request->project_closing_year,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('show_history_sales_pipeline' , $history->sales_pipeline_id));
    }

    public function exportSalesPipeline(Request $request){
        $sales_pipeline_report = $this->getSalesPipelineAjax($request)['sales_pipeline_report'];

        return Excel::download(new SalesPipelineReport($sales_pipeline_report), 'SalesPipelineReportExcel.xlsx');
    }


}
