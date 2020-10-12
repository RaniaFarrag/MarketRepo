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
        $meetings = CompanyMeeting::where('user_id' , Auth::user()->id)
                                    ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'))
                                    ->with('company' , 'user')
                                    ->paginate(10);
//        dd($meetings);
        $company_registered_today_created_by_me = Company::where('user_id' , Auth::user()->id)
            ->whereDate('created_at' , Carbon::today())->count();

        if (Auth::user()->hasRole('Representative')){
            $total_companies = Company::where('representative_id' , Auth::user()->id)->count();

            $today_meetings = CompanyMeeting::where('user_id' , Auth::user()->id)
                ->whereDate('date' , Carbon::today())->count();

            $coming_meetings = CompanyMeeting::where('user_id' , Auth::user()->id)
                ->whereDate('date' , '>=' , Carbon::today())
                ->where('time' , '>' , Carbon::now())
                ->count();

            $rep_reports = Company_sales_lead_report::where('user_id' , Auth::user()->id)->count();
        }

        elseif (Auth::user()->hasRole('Sales Manager')){
            $total_companies = Company::WhereIn('sector_id' , Auth::user()->sectors->pluck('id'))->count();

//            $today_meetings = CompanyMeeting::where('user_id' , Auth::user()->id)
//                                    ->orWhereIn('user_id' ,Auth::user()->childs->pluck('id'))
//                                    ->whereDate('date' , Carbon::today())->count();

            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())
                                            ->where(function ($q){
                                                $q->where('user_id' , Auth::user()->id)
                                                    ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'));
                                            })->count();

            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                                            ->where('time' , '>' , Carbon::now())
                                            ->where(function ($q){
                                                $q->where('user_id' , Auth::user()->id)
                                                    ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'));
                                            })->count();

            $rep_reports = Company_sales_lead_report::where('user_id' , Auth::user()->id)
                ->orWhereIn('user_id' , Auth::user()->childs->pluck('id'))->count();
        }

        else{
            $total_companies = Company::all()->count();

            $today_meetings = CompanyMeeting::whereDate('date' , Carbon::today())->count();

            $coming_meetings = CompanyMeeting::whereDate('date' , '>=' , Carbon::today())
                ->where('time' , '>' , Carbon::now())
                ->count();

            $rep_reports = Company_sales_lead_report::all()->count();
        }

        $total_users_under_me = User::where('parent_id' , Auth::user()->id)->count();


        return view('system.home')->with(['meetings'=>$meetings ,
            'company_registered_today_created_by_me'=>$company_registered_today_created_by_me,
            'total_companies'=>$total_companies,
            'total_users_under_me'=>$total_users_under_me,
            'today_meetings'=>$today_meetings,
            'coming_meetings'=>$coming_meetings,
            'rep_reports'=>$rep_reports,]);
    }
}
