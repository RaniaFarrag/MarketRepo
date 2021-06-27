<?php

namespace App\Http\Controllers;

use App\Exports\TellerReport;
use App\Models\Company;
use App\Models\MeetingTeller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use const http\Client\Curl\AUTH_ANY;

class MeetingTellerController extends Controller
{
    public function AddTellerReport(){
        $representatives = User::where('active' , 1)->where(function ($q){
            $q->whereNotNull('parent_id');
        })->get();

        return view('system.teller_report.create' , compact('representatives'));
    }

    public function storeTellerReport(Request $request){
        $request->validate([
            'representative_id' => 'required',
            'company_id' => 'required',
        ]);

        MeetingTeller::create([
            'user_id' => Auth::user()->id,
            'representative_id' => $request->representative_id,
            'company_id' => $request->company_id,
            'mother_company_id' => $request->mother_company_id,
            'date_call' => $request->date_call,
            'time_call' => $request->time_call,
            'feedback' => $request->feedback,
            'date_meeting' => $request->date_meeting,
            'time_meeting' => $request->time_meeting,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('get_teller_report'));
    }

    public function getTellerReport(Request $request){
        $tellers = User::where('active' , 1)->whereHas('roles' , function ($q){
            $q->where('id' , 6);
        })->get();

        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')){
            $representatives = User::where('active' , 1)->whereNotNull('parent_id')->get();
            $companies = Company::whereHas('meetingTeller')->get();
        }

        elseif(Auth::user()->hasRole('Sales Representative')){
            $representatives = User::where('id' , Auth::user()->id)->get();
            $companies = Company::whereHas('meetingTeller' , function ($q){
                $q->where('representative_id' , Auth::user()->id);
            })->get();
        }

        else{
            $representatives = User::where('active' , 1)->where('parent_id' , Auth::user()->id)->get();
            $companies = Company::whereHas('meetingTeller' , function ($q){
                $q->WhereIn('representative_id' , Auth::user()->childs()->pluck('id'));
            })->get();
        }

        $teller_reports = $this->getTellerReportAjax($request)['teller_report'];
        $count = $this->getTellerReportAjax($request)['count'];

        if ($request->ajax()){
            $data_json['viewBlade']= view('system.teller_report.report_partial'
                , compact('teller_reports'))->render();
            $data_json['count']= $count;
            return response()->json($data_json);
        }

        return view('system.teller_report.report' , compact('teller_reports' , 'companies'
            ,'representatives' , 'count' , 'tellers'));
    }

    public function getTellerReportAjax($request){
        if (Auth::user()->hasRole('ADMIN')){
            $teller_reports = MeetingTeller::query();
        }
        elseif (Auth::user()->hasRole('Sales Manager')){
            $teller_reports = MeetingTeller::where('mother_company_id' , Auth::user()->mother_company_id);
        }
        elseif (Auth::user()->hasRole('Coordinator')){
            $teller_reports = MeetingTeller::where('user_id' , Auth::user()->id);
        }
        elseif (Auth::user()->hasRole('Sales Representative')){
            $teller_reports = MeetingTeller::where('representative_id' , Auth::user()->id);
        }

        if ($request->representative_id){
            $teller_reports->where('representative_id' , $request->representative_id);
        }

        if ($request->company_id){
            $teller_reports->where('company_id' , $request->company_id);
        }

        if ($request->date_meeting_from){
            $teller_reports->where('date_meeting' , '>=' , $request->date_meeting_from);
        }
        if ($request->date_meeting_to){
            $teller_reports->where('date_meeting' ,  '<=' ,$request->date_meeting_to);
        }
        if ($request->date_call_from){
            $teller_reports->where('date_call' , '>=' ,$request->date_call_from);
        }
        if ($request->date_call_to){
            $teller_reports->where('date_call' , '<=' ,$request->date_call_to);
        }
        if ($request->user_id){
            $teller_reports->where('user_id' , '=' ,$request->user_id);
        }

        $data['teller_report'] = $teller_reports->orderBy('id' , 'desc')->get();
        $data['count'] = $teller_reports->count();
        return $data;
    }

    public function getAssignedCompanies($representative_id){

        $representative = User::findOrFail($representative_id);
        //dd($representative->mother_company_id);
        return response()->json(['companies' => $representative->assignedCompanies ,
            'mother_company_id' => $representative->mother_company_id]);
    }

    public function editTellerReport($teller_report_id){
        $representatives = User::where('active' , 1)->where(function ($q){
            $q->whereNotNull('parent_id');
        })->get();

        $teller_report = MeetingTeller::findOrFail($teller_report_id);
        $representative = User::findOrFail($teller_report->representative_id);
        $companies = $representative->assignedCompanies;

        return view('system.teller_report.edit' , compact('representatives' , 'teller_report' ,
            'companies'));
    }

    public function updateTellerReport(Request $request , $teller_report_id){
        $request->validate([
            'representative_id' => 'required',
            'company_id' => 'required',
        ]);

        $teller_report = MeetingTeller::findOrFail($teller_report_id);

        $teller_report->update([
            'user_id' => Auth::user()->id,
            'representative_id' => $request->representative_id,
            'company_id' => $request->company_id,
            'mother_company_id' => $teller_report->mother_company_id,
            'date_call' => $request->date_call,
            'time_call' => $request->time_call,
            'feedback' => $request->feedback,
            'date_meeting' => $request->date_meeting,
            'time_meeting' => $request->time_meeting,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('get_teller_report'));
    }

    public function exportExcelTellerReport(Request $request){
        $teller_reports = $this->getTellerReportAjax($request)['teller_report'];
        return Excel::download(new TellerReport($teller_reports), 'TellerReportExcel.xlsx');
    }


}
