<?php

namespace App\Http\Controllers;

use App\Exports\countReport;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Repositories\UserRepository;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $userRepositoryinterface;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UserRepositoryInterface $userRepositoryinterface)
    {
        $this->userRepositoryinterface = $userRepositoryinterface;
        //$this->middleware('permission:Add Company', ['only' => ['store']]);

    }
    /** View All Users */
    public function index()
    {
        $users = $this->userRepositoryinterface->index();
        return view('system.users.index')->with('users', $users);
    }
    /** Create User */

    public function create()
    {
        $data = $this->userRepositoryinterface->create();
        return view('system.users.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /** Store User */
    public function store(UserRequest $request)
    {
        return $this->userRepositoryinterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /** Edit User */
    public function edit(User $user)
    {
        //dd($user->sectors);
        $data = $this->userRepositoryinterface->edit();
        //$sectors_ids = $user->sectors()->pluck('sector_id')->toArray();
        //dd($sectors_ids[1]['id']);
        //dd($sectors_ids);
        return view('system.users.edit')->with(['user' => $user, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit User */
    public function update(UserRequest $request, User $user)
    {
        return $this->userRepositoryinterface->update($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /** Delete User */
    public function destroy(User $user)
    {
        return $this->userRepositoryinterface->destroy($user);
    }

    /** Representative Report */
    public function rep_companies_report(Request $request)
    {
        $reps = $this->userRepositoryinterface->get_reps();
        if ($request->ajax()) {
            $companies = $this->userRepositoryinterface->rep_companies_report($request)['companies'];
            $count = $this->userRepositoryinterface->rep_companies_report($request)['count'];
            $rep = $this->userRepositoryinterface->rep_companies_report($request)['rep'];
            $confirm_connected = $this->userRepositoryinterface->rep_companies_report($request)['confirm_connected'];
            $confirm_interview = $this->userRepositoryinterface->rep_companies_report($request)['confirm_interview'];
            $confirm_need = $this->userRepositoryinterface->rep_companies_report($request)['confirm_need'];
            $confirm_contract = $this->userRepositoryinterface->rep_companies_report($request)['confirm_contract'];
            $count_meetings = $this->userRepositoryinterface->rep_companies_report($request)['count_meetings'];
            $user_log = $this->userRepositoryinterface->rep_companies_report($request)['user_log'];


            $data_json['viewBlade']= view('system.reports.rep_report_partial' , compact('companies','confirm_connected',
                'confirm_contract','confirm_interview','confirm_need','rep', 'count_meetings' , 'user_log'))->render();
            $data_json['count']= $count;

            return response()->json($data_json);

//            return view('system.reports.rep_report_partial',compact('companies','confirm_connected',
//                'confirm_contract','confirm_interview','confirm_need','rep' , 'count'))->render();
        }
        return view('system.reports.rep_report', compact('reps'));
    }

    /** Export Representative Company Report */
    public function export_representative_company_report(Request $request){
        $companies = $this->userRepositoryinterface->rep_companies_report($request , true)['companies'];
        $rep = $this->userRepositoryinterface->rep_companies_report($request)['rep'];
        $confirm_connected = $this->userRepositoryinterface->rep_companies_report($request)['confirm_connected'];
        $confirm_interview = $this->userRepositoryinterface->rep_companies_report($request)['confirm_interview'];
        $confirm_need = $this->userRepositoryinterface->rep_companies_report($request)['confirm_need'];
        $confirm_contract = $this->userRepositoryinterface->rep_companies_report($request)['confirm_contract'];
        $count_meetings = $this->userRepositoryinterface->rep_companies_report($request)['count_meetings'];

        return Excel::download(new representativeReport($companies , $rep , $confirm_connected , $confirm_interview ,
            $confirm_need , $confirm_contract , $count_meetings), 'RepresentativeReportExcel.xlsx');
    }

    /** Active User */
    public function activeUser(Request $request){
        return $this->userRepositoryinterface->activeUser($request);
    }

    /** Deactivate User */
    public function deactivateUser(Request $request){
        //dd($request->all());
        return $this->userRepositoryinterface->deactivateUser($request);
    }

    /** Get Count Of Visits & Adding'sCompanies For Every Representative */
    public function getVisitscountReport(Request $request){
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator'))
            $representatives = User::where('active' , 1)->whereNotNull('parent_id')->orderBy('id' , 'asc')->get();
        else
            $representatives = User::where('active' , 1)->where('parent_id' , Auth::user()->id)->get();
        //$representatives = User::where('active' , 1)->whereNotNull('parent_id')->orderBy('id' , 'asc')->get();

        $data_counts = $this->userRepositoryinterface->getVisitscountReport($request)['listofCounts'];
        $representative_name = $this->userRepositoryinterface->getVisitscountReport($request)['representative_name'];

        $chart_array1 = $this->userRepositoryinterface->getVisitscountReport($request)['chart_array1'];
        $chart_array2 = $this->userRepositoryinterface->getVisitscountReport($request)['chart_array2'];

        $sum_added = $this->userRepositoryinterface->getVisitscountReport($request)['sum_added'];
        $sum_visited = $this->userRepositoryinterface->getVisitscountReport($request)['sum_visited'];

        $salary = $this->userRepositoryinterface->getVisitscountReport($request)['salary'];
        $daily_visits = $this->userRepositoryinterface->getVisitscountReport($request)['daily_visits'];
        $visit_price = $this->userRepositoryinterface->getVisitscountReport($request)['visit_price'];

        if($request->ajax()){
            $data_json['viewBlade']= view('system.companies_visits_count.report_partial')
                ->with(['data_counts' => $data_counts , 'representative_name'=>$representative_name ,
                    'chart_array1'=>$chart_array1 , 'chart_array2'=>$chart_array2,
                    'sum_added'=>$sum_added , 'sum_visited'=>$sum_visited , 'salary'=>$salary ,
                    'daily_visits'=>$daily_visits , 'visit_price'=>$visit_price])->render();
            $data_json['representative_name'] = $representative_name;
            $data_json['chart_array1'] = $chart_array1;
            $data_json['chart_array2'] = $chart_array2;
            return response()->json($data_json);
        }

        return view('system.companies_visits_count.report' , compact('representatives' , 'data_counts'
        ,'representative_name' , 'chart_array1' , 'chart_array2' , 'sum_added' , 'sum_visited' , 'salary' , 'daily_visits' , 'visit_price'));
    }

    public function generateChart(Request $request){
        $period = CarbonPeriod::create($request->from , $request->to);
        $representative = User::findOrFail($request->representative_id);
        $representative_name = $representative->name_en;

        foreach ($period as $date) {
            $listOfDates[] = $date->format('Y-m-d');
        }

        foreach ($listOfDates as $k=>$date) {
            $added_count = Company::where('user_id' , $representative->id)->whereDate('created_at' , $date)->count();
            $visit_count = Company_sales_lead_report::where('user_id' , $representative->id)
                            ->where('visit_date' , $date)->count();

//            $chart_array1[$k]['label'] = $date;
//            $chart_array1[$k]['y'] = $added_count;
            $chart_array1[] = $added_count;

//            $chart_array2[$k]['label'] = $date;
//            $chart_array2[$k]['y'] = $visit_count;

            $chart_array2[] = $visit_count;
        }

//        return view('system.companies_visits_count.chart' , compact('chart_array1' ,
//            'chart_array2' , 'representative_name'));

        return view('system.chart.chart' , compact('listOfDates','chart_array1' ,
            'chart_array2' , 'representative_name'));
    }

    public function exportVisitsCountReport(Request $request){
        //dd($request->all());
        $data_counts = $this->userRepositoryinterface->getVisitscountReport($request)['listofCounts'];
        //dd($data_counts);
        $representative_name = $this->userRepositoryinterface->getVisitscountReport($request)['representative_name'];

        $sum_added = $this->userRepositoryinterface->getVisitscountReport($request)['sum_added'];
        $sum_visited = $this->userRepositoryinterface->getVisitscountReport($request)['sum_visited'];

//        $chart_array1 = $this->userRepositoryinterface->getVisitscountReport($request)['chart_array1'];
//        $chart_array2 = $this->userRepositoryinterface->getVisitscountReport($request)['chart_array2'];

        $salary = $this->userRepositoryinterface->getVisitscountReport($request)['salary'];
        $daily_visits = $this->userRepositoryinterface->getVisitscountReport($request)['daily_visits'];

        return Excel::download(new countReport($data_counts , $representative_name , $sum_added , $sum_visited ,
            $salary , $daily_visits), 'GeneralReportExcel.xlsx');
    }


//    public function changeAuth()
//    {
//        if(Auth::user()->id == 13471)
//            $user=User::find(13473)
//    }
}
