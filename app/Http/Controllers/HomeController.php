<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\CompanyMeeting;
use App\Models\MotherCompany;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //dd($request->mother_company_id);
        $total_companies = Company::all()->count();
        $company_registered_today = Company::whereDate('created_at' , Carbon::today())->count();

        $mother_companies = MotherCompany::all();

//        if($request->mother_company_id){
//            $mother_company_id = $request->mother_company_id;
//        }
//        else{
//            $mother_company_id = Auth::user()->mother_company_id;
//        }

        if (Auth::user()->hasRole('ADMIN')){
            $total_users_under_me = User::where('mother_company_id' , $request->mother_company_id)->count();

            $rep_daily_reports = Company_sales_lead_report::whereHas('user' , function ($q) use ($request){
                $q->where('users.mother_company_id' , $request->mother_company_id);
            })->count();

            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())
                                            ->whereHas('user' , function ($q) use ($request){
                                                $q->where('users.mother_company_id' , $request->mother_company_id);
                                            })->count();

            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                                            ->whereHas('user' , function ($q) use ($request){
                                                $q->where('users.mother_company_id' , $request->mother_company_id);
                                            })->count();

            $meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                                        ->whereHas('user' , function ($q) use ($request){
                                            $q->where('users.mother_company_id' , $request->mother_company_id);
                                        })
                                        ->with('company' , 'user')
                                        ->paginate(10);

        }

        elseif (Auth::user()->hasRole('Sales Manager')){
            $company_registered_today = Company::whereDate('created_at' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id)
                        ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                })->count();


            //Companies in my sectors
            $total_companies = Company::WhereIn('sector_id' , Auth::user()->sectors->pluck('id'))->count();
            $total_users_under_me = User::where('parent_id' , Auth::user()->id)
                                    ->where('mother_company_id' ,$request->mother_company_id)->count();
            $rep_daily_reports = Company_sales_lead_report::where('user_id' , Auth::user()->id)
                ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'))->count();
            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id)
                        ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                })->count();
            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id)
                        ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'));
                })->count();
            //dd($coming_meetings);
            $meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id)
                        ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                })
                ->with('company' , 'user')
                ->paginate(10);

        }

        elseif (Auth::user()->hasRole('Sales Representative')){

            //All Companies created by me
            $company_registered_today = Company::whereDate('created_at' , Carbon::today())
                ->where('user_id' , Auth::user()->id)->count();

            //Assign to me
            $total_companies = Auth::user()->assignedCompanies()->where('mother_company_id' , $request->mother_company_id)->count();
            $total_users_under_me = 0;
            $rep_daily_reports = Company_sales_lead_report::where('user_id' , Auth::user()->id)->count();
            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())
                ->where('user_id' , Auth::user()->id)->count();
            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                //->where('time' , '>' , Carbon::now())
                ->where('user_id' , Auth::user()->id)->count();


            $meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id);
                        //->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
                })
                ->with('company' , 'user')
                ->paginate(10);

        }

        elseif (Auth::user()->hasRole('Data Entry')){

            //All Companies created by me
            $company_registered_today = Company::whereDate('created_at' , Carbon::today())
                ->where('user_id' , Auth::user()->id)->count();

            $rep_daily_reports = 0 ;
            $today_meetings = 0 ;
            $coming_meetings = 0 ;
            $meetings = 0 ;
        }

        else{
            //All Companies created by me
            $company_registered_today = Company::whereDate('created_at' , Carbon::today())
                ->where('user_id' , Auth::user()->id)->count();

            $rep_daily_reports = 0 ;
            $today_meetings = 0 ;
            $coming_meetings = 0 ;
            $meetings = 0 ;

        }

        if($request->ajax()){
            //dd(43335);
            $data_json['total_users_under_me'] = $total_users_under_me;

            $data_json['company_registered_today'] = $company_registered_today;
            $data_json['total_companies'] = $total_companies;

            $data_json['rep_daily_reports'] = $rep_daily_reports;
            $data_json['today_meetings'] = $today_meetings;
            $data_json['coming_meetings']= $coming_meetings;

            $data_json['viewblade']= view('system.home_meetings_table')
                ->with(['meetings' => $meetings , 'mother_company_id' => $request->mother_company_id])->render();


            return response()->json($data_json);
        }

        return view('system.home')->with([
//            'total_users_under_me'=>$total_users_under_me,
//            'company_registered_today'=>$company_registered_today,
//            'total_companies'=>$total_companies,
//            'rep_daily_reports'=>$rep_daily_reports,
//            'today_meetings'=>$today_meetings,
//            'coming_meetings'=>$coming_meetings,
//
            'meetings'=>$meetings ,

            'mother_company_id'=>$request->mother_company_id,
            'mother_companies'=>$mother_companies,
            ]);
    }
}
