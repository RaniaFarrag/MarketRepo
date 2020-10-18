<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\CompanyMeeting;
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
    public function index()
    {
        $total_companies = Company::all()->count();
        $total_users_under_me = User::all()->count();

        if (Auth::user()->hasRole('ADMIN')){
            $company_registered_today = Company::whereDate('created_at' , Carbon::today())->count();
            //All Companies
            $rep_daily_reports = Company_sales_lead_report::all()->count();
            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())->count();
            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())->count();

            $meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
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
            $total_users_under_me = User::where('parent_id' , Auth::user()->id)->count();
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
            $total_companies = Company::where('representative_id' , Auth::user()->id)->count();
            $total_users_under_me = 0;
            $rep_daily_reports = Company_sales_lead_report::where('user_id' , Auth::user()->id)->count();
            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())
                ->where('user_id' , Auth::user()->id)->count();
            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                //->where('time' , '>' , Carbon::now())
                ->where('user_id' , Auth::user()->id)->count();


            $meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                ->where(function ($q){
                    $q->where('user_id' , Auth::user()->id)
                        ->orWhereIn('user_id' , Auth::user()->childs()->pluck('id'));
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

        return view('system.home')->with(['meetings'=>$meetings ,
            'company_registered_today_created_by_me'=>$company_registered_today,
            'total_companies'=>$total_companies,
            'total_users_under_me'=>$total_users_under_me,
            'rep_daily_reports'=>$rep_daily_reports,
            'today_meetings'=>$today_meetings,
            'coming_meetings'=>$coming_meetings,
            ]);
    }
}
