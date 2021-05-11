<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyRequest;
use App\Models\MotherCompany;
use App\Models\Note;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $requests = CompanyRequest::where('user_id' , Auth::user()->id)->paginate(15);
        foreach ($requests as $request){
            $company_user = CompanyUser::where('company_id' , $request->company_id)
                ->where('mother_company_id' , Auth::user()->mother_company_id)->first();
            $request['status'].= $company_user->evaluation_status;
        }
        return view('system.company_requests.index' , compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $companies = Company::whereHas('representative' ,function ($q){
//            $q->where('user_id' , Auth::user()->id)
//                ->where('company_user.mother_company_id' , Auth::user()->mother_company_id);
//        })->get();
        $companies = Auth::user()->assignedCompanies()->get();
        return view('system.company_requests.create' , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_user = CompanyUser::where('company_id' , $request->company_id)->where('user_id' , Auth::user()->id)
            ->where('mother_company_id' , Auth::user()->mother_company_id)->first();

        CompanyRequest::create([
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
            'company_user_id' => $company_user->id,
            'mother_company_id' => Auth::user()->mother_company_id,
            'request_type' => $request->request_type,
            'quantity' => $request->quantity,
            'date' => $request->date,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('company_requests_of_user'));
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
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(){

    }

    public function getRequestsReport(Request $request){
        $mother_companies = MotherCompany::all();

        $representatives = $this->getRequestsReportAjax($request)['representatives'];
        $requests_report = $this->getRequestsReportAjax($request)['requests_report'];
        $count = $this->getRequestsReportAjax($request)['count'];

        if ($request->ajax()){
            $data_json['viewBlade']= view('system.company_requests.requests_report_partial'
                , compact('requests_report'))->render();
            $data_json['count']= $count;
            return response()->json($data_json);
        }

        return view('system.company_requests.requests_report' , compact('requests_report' ,'count',
            'representatives' , 'mother_companies'));
    }

    public function getRequestsReportAjax($request){
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')){
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
            $requests_report = CompanyRequest::with(['notes' => function($query){
                $query->orderBy('created_at', 'desc')->first();
            }])->orderBy('id' , 'desc');
            //dd($requests_report->get());
        }

        elseif(Auth::user()->hasRole('Sales Manager')){
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id);
                        //->orWhere('id' , Auth::user()->id);
                })->get();
            $requests_report = CompanyRequest::whereIn('user_id' , Auth::user()->childs->pluck('id'))
                ->with(['notes' => function($query){
                $query->orderBy('created_at', 'desc')->first();
            }])->orderBy('id' , 'desc');
        }

        else{
            $representatives = User::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();
            $requests_report = CompanyRequest::where('user_id' , Auth::user()->id)
                ->with(['notes' => function($query){
                    $query->orderBy('created_at', 'desc')->first();
                }])->orderBy('id' , 'desc');
        }

        if ($request->mother_company_id)
            $requests_report->where('mother_company_id' , $request->mother_company_id);

        if ($request->representative_id){
            $requests_report->where('user_id' , $request->representative_id);
        }

        if ($request->from){
            $requests_report->where('date' , '>=' , $request->from);
        }

        if ($request->to){
            $requests_report->where('date' , '<=' , $request->to);
        }

        if (isset($request->evaluation_ids) && count($request->evaluation_ids) > 0){
            $requests_report->whereHas('companyUser' , function ($q) use ($request){
                $q->whereIn('evaluation_status' , $request->evaluation_ids);
            });
            //dd($requests_report->get());
        }

        $data['requests_report'] = $requests_report->get();

        foreach ($data['requests_report'] as $request){
            $company_user = CompanyUser::where('company_id' , $request->company_id)
                ->where('mother_company_id' , $request->mother_company_id)->first();
            $request['status'].= $company_user->evaluation_status;
        }

        $data['representatives'] = $representatives;
        $data['count'] = $requests_report->count();
        return $data;
    }

    public function getNotesOfRequestReport($report_id){
        $report = CompanyRequest::findOrFail($report_id);
        if (Auth::user()->hasRole('Sales Representative')){
            if($report->user_id == Auth::user()->id){
                $report = CompanyRequest::where('id' , $report_id)->with(['notes' => function($q){
                    $q->orderBy('id' , 'desc');
                }])->first();
                return view('system.company_requests.get_notes_of_request_report' , compact('report'));
            }
            else{
                return view('system.company_requests.not_found');
            }
        }

        elseif (Auth::user()->hasRole('Sales Manager')){
            $requests_report = CompanyRequest::where('id' , $report->id)
                ->whereIn('user_id' , Auth::user()->childs->pluck('id'))->first();
            if ($requests_report){
                $report = CompanyRequest::where('id' , $report_id)->with(['notes' => function($q){
                    $q->orderBy('id' , 'desc');
                }])->first();
                return view('system.company_requests.get_notes_of_request_report' , compact('report'));
            }
            else{
                return view('system.company_requests.not_found');
            }

        }

        else{
            $report = CompanyRequest::where('id' , $report_id)->with(['notes' => function($q){
                $q->orderBy('id' , 'desc');
            }])->first();
            return view('system.company_requests.get_notes_of_request_report' , compact('report'));
        }
    }

    public function createNotesOfRequestReport($report_id){
        return view('system.company_requests.create_notes_of_request_report' , compact('report_id'));
    }

    public function saveNotesOfRequestReport(Request $request){

        $report = CompanyRequest::findOrFail($request->report_id);

        $report->notes()->create([
            'feedback' => $request->feedback,
            'note' => $request->note,
            'next_follow_date' => $request->next_follow_date,
            'request_status' => $request->request_status,
        ]);

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('get_notes_of_request_report' , $report->id));
    }

    public function editNotesOfRequestReport($note_id){
        $note = Note::findOrFail($note_id);
        return view('system.company_requests.edit_notes_of_request_report' , compact('note'));
    }

    public function updateNotesOfRequestReport(Request $request , $note_id){

        $note = Note::findOrFail($note_id);

        $note->update([
            'feedback' => $request->feedback,
            'note' => $request->note,
            'next_follow_date' => $request->next_follow_date,
            'request_status' => $request->request_status,
        ]);

        Alert::success('success', trans('dashboard.added successfully'));
        return redirect(route('get_notes_of_request_report' , $note->company_request_id));
    }
}

