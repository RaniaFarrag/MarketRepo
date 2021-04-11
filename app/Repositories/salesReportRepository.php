<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;

use App\Interfaces\salesReportRepositoryInterface;
use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\Country;
use App\Models\Sector;
use App\Traits\logTrait;
use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class salesReportRepository implements salesReportRepositoryInterface
{
    use LogTrait;

    protected $sales_lead_report_model;
    protected $sector_model;
    protected $country_model;
    protected $user_model;


    public function __construct(Company_sales_lead_report $sales_lead_report_model, Sector $sector, Country $country , User $user)
    {
        $this->sales_lead_report_model = $sales_lead_report_model;
        $this->country_model = $country;
        $this->sector_model = $sector;
        $this->user_model = $user;

    }

    /** View All Reports */
    public function index($request , $all = null)
    {
//        dd($request->ids);
        $ids = $request->ids;
        $checkAll = $request->checkAll;
        if ((!isset($ids) && is_null($ids)) || $checkAll == 1)
        {
            if (Auth::user()->hasRole('ADMIN')){
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->whereNotNull('parent_id')
                            ->orWhereHas('childs');
                    })->get();
//                dd($data['representatives']);
                $query = $request->company ? $request->company->salesLeadReports() : $this->sales_lead_report_model::query();
            }
            elseif(Auth::user()->hasRole('Sales Manager')){
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->where('parent_id' , Auth::user()->id)
                            ->orWhere('id' , Auth::user()->id);
                    })->get();

                $query = $this->sales_lead_report_model::whereHas('company' , function ($q){
                    $q->whereIn('sector_id' , Auth::user()->sectors->pluck('id'));
                });
            }
            else{
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->where('parent_id' , Auth::user()->id)
                            ->orWhere('id' , Auth::user()->id);
                    })->get();
                $query = Auth::user()->company_sales_lead_report();

            }

//            $query = Company::WhereIn('sector_id', Auth::user()->sectors->pluck('id'))->with('salesLeadReports');
            //dd($query->get());

            if ($request->name)
                $query->whereHas('company', function ($q) use ($request) {
                    $q->whereTranslationLike('name', '%' . $request->name . '%');
                });
            if ($request->country_id)
                $query->whereHas('company', function ($q) use ($request) {
                    $q->where('country_id', $request->country_id);
                });

            if ($request->city_id)
                $query->whereHas('company', function ($q) use ($request) {
                    $q->where('city_id', $request->city_id);
                });
            if ($request->quanity)
                $query->where('quanity', $request->quanity);
            if ($request->type_of_serves)
                $query->where('type_of_serves', $request->type_of_serves);
            if ($request->brochurs_status)
                $query->where('brochurs_status', $request->brochurs_status);
            if ($request->cat_of_req)
                $query->where('cat_of_req', $request->cat_of_req);
            if ($request->representative_id)
                $query->where('user_id' , $request->representative_id);
            if ($request->created_at)
                $query->whereDate('created_at', $request->created_at);
            if ($request->nextFollowUp)
                $query->whereDate('nextFollowUp', $request->nextFollowUp);
            if (isset($request->statue) && count($request->statue) > 0)
                $query->where(function ($q) use ($request) {
                    $q->where('statue',$request->statue[0]);
                    foreach ($request->statue as $key => $val)
                    {
                        if ($key==0)
                            continue;
                        $q->orWhere('statue',$val);
                    }

                });
        }
        else{
            //dd(json_decode($request->ids));
            //$query = $this->sales_lead_report_model::query()->whereIn('id',$request->ids);
            if(is_array($request->ids)){
                $ids_ = $request->ids;
                //dd($ids_);
            }
            else{
                $ids_ = json_decode($request->ids);
            }
//
            if($all){   //Export Excel
                $query = $this->sales_lead_report_model::whereIn('id', $ids_);
            }
            else{
                $query = $this->sales_lead_report_model::query();
//                $query = Auth::user()->company_sales_lead_report();
            }


//            $query = $this->sales_lead_report_model::whereIn('id', json_decode(json_encode($request->ids)));
            if (Auth::user()->hasRole('ADMIN')){
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->whereNotNull('parent_id')
                            ->orWhereHas('childs');
                    });
            }
            elseif(Auth::user()->hasRole('Sales Manager')){
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->where('parent_id' , Auth::user()->id)
                            ->orWhere('id' , Auth::user()->id);
                    })->get();
            }
            else{
                $data['representatives'] = $this->user_model::where('active' , 1)
                    ->where(function ($q){
                        $q->where('parent_id' , Auth::user()->id)
                            ->orWhere('id' , Auth::user()->id);
                    })->get();
            }
        }

//        if ($all){
//            $data['reports'] = $query->get();
//        }
//        else{
//            $data['count'] = $query->count();
//            $data['reports'] = $query->paginate(15);
//        }

//        if (Auth::user()->hasRole('ADMIN')){
//            $data['representatives'] = $this->user_model::where('active' , 1)
//                ->where(function ($q){
//                    $q->whereNotNull('parent_id')
//                        ->orWhereHas('childs');
//                })->get();
//        }
//        else{
//            $data['representatives'] = $this->user_model::where('parent_id' , Auth::user()->id)->get();
//        }

        $data['count'] = $query->count();
        $data['reports'] = $all ? $query->orderBy('created_at' , 'desc')->get() : $query->orderBy('created_at' , 'desc')->paginate(15);
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();
        $data['ids'] = $ids;
        $data['checkAll'] = $checkAll;

        return $data;
    }



//    public function show($request , $company_id , $mother_company_id , $all = null)
//    {
////        dd($request->all());
//        $ids = $request->ids;
//        $checkAll = $request->checkAll;
//        if ((!isset($ids) && is_null($ids)) || $checkAll == 1)
//        {
//            if (Auth::user()->hasRole('ADMIN')){
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->whereNotNull('parent_id')
//                            ->orWhereHas('childs');
//                    })->get();
////                dd($data['representatives']);
//                $query = $request->company ? $request->company->salesLeadReports() : $this->sales_lead_report_model::query();
//            }
//            elseif(Auth::user()->hasRole('Sales Manager')){
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->where('parent_id' , Auth::user()->id)
//                            ->orWhere('id' , Auth::user()->id);
//                    })->get();
//
//                $query = $request->company ? $request->company->salesLeadReports() : $this->sales_lead_report_model::query();
////                $query = $this->sales_lead_report_model::whereHas('company' , function ($q){
////                    $q->whereIn('sector_id' , Auth::user()->sectors->pluck('id'));
////                });
//            }
//            else{
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->where('parent_id' , Auth::user()->id)
//                            ->orWhere('id' , Auth::user()->id);
//                    })->get();
//                $query = Auth::user()->company_sales_lead_report();
//            }
//
////            $query = Company::WhereIn('sector_id', Auth::user()->sectors->pluck('id'))->with('salesLeadReports');
//            //dd($query->get());
//
//            if ($request->name)
//                $query->whereHas('company', function ($q) use ($request) {
//                    $q->whereTranslationLike('name', '%' . $request->name . '%');
//                });
//            if ($request->country_id)
//                $query->whereHas('company', function ($q) use ($request) {
//                    $q->where('country_id', $request->country_id);
//                });
//
//            if ($request->city_id)
//                $query->whereHas('company', function ($q) use ($request) {
//                    $q->where('city_id', $request->city_id);
//                });
//            if ($request->quanity)
//                $query->where('quanity', $request->quanity);
//            if ($request->type_of_serves)
//                $query->where('type_of_serves', $request->type_of_serves);
//            if ($request->brochurs_status)
//                $query->where('brochurs_status', $request->brochurs_status);
//            if ($request->cat_of_req)
//                $query->where('cat_of_req', $request->cat_of_req);
//            if ($request->representative_id)
//                $query->where('user_id' , $request->representative_id);
//            if ($request->created_at)
//                $query->whereDate('created_at', $request->created_at);
//            if ($request->nextFollowUp)
//                $query->whereDate('nextFollowUp', $request->nextFollowUp);
//            if (isset($request->statue) && count($request->statue) > 0)
//                $query->where(function ($q) use ($request) {
//                    $q->where('statue',$request->statue[0]);
//                    foreach ($request->statue as $key => $val)
//                    {
//                        if ($key==0)
//                            continue;
//                        $q->orWhere('statue',$val);
//                    }
//
//                });
//        }
//        else{
////            dd(json_decode(json_encode($request->ids) , true));
//            //$query = $this->sales_lead_report_model::query()->whereIn('id',$request->ids);
//            $query = $this->sales_lead_report_model::query()->whereIn('id', json_decode((json_encode($request->ids)) , true));
//            if (Auth::user()->hasRole('ADMIN')){
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->whereNotNull('parent_id')
//                            ->orWhereHas('childs');
//                    })->get();
//            }
//            elseif(Auth::user()->hasRole('Sales Manager')){
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->where('parent_id' , Auth::user()->id)
//                            ->orWhere('id' , Auth::user()->id);
//                    })->get();
//            }
//            else{
//                $data['representatives'] = $this->user_model::where('active' , 1)
//                    ->where(function ($q){
//                        $q->where('parent_id' , Auth::user()->id)
//                            ->orWhere('id' , Auth::user()->id);
//                    })->get();
//            }
//        }
//
////        if ($all){
////            $data['reports'] = $query->get();
////        }
////        else{
////            $data['count'] = $query->count();
////            $data['reports'] = $query->paginate(15);
////        }
//
////        if (Auth::user()->hasRole('ADMIN')){
////            $data['representatives'] = $this->user_model::where('active' , 1)
////                ->where(function ($q){
////                    $q->whereNotNull('parent_id')
////                        ->orWhereHas('childs');
////                })->get();
////        }
////        else{
////            $data['representatives'] = $this->user_model::where('parent_id' , Auth::user()->id)->get();
////        }
//
//        $data['count'] = $query->count();
//        $data['reports'] = $all ? $query->orderBy('created_at' , 'desc')->get() : $query->orderBy('created_at' , 'desc')->paginate(15);
//        $data['sectors'] = $this->sector_model::all();
//        $data['countries'] = $this->country_model::all();
//        $data['ids'] = $ids;
//        $data['checkAll'] = $checkAll;
//
//        return $data;
//    }


    public function show($company , $mother_company_id)
    {
        return $this->sales_lead_report_model::where('company_id' , $company->id)->paginate(15);

//        else{
//            $query = Auth::user()->company_sales_lead_report();
//        }
        //$query = Company::WhereIn('sector_id', Auth::user()->sectors->pluck('id'))->with('salesLeadReports');

    }


    /** Store Role */
    public function store($request , $company)
    {
        $report = $this->sales_lead_report_model::create([
            'cat_of_req' => $request->cat_of_req,
            'company_id' => $company->id,
//            'company_id' => $request->company_id,
            'brochurs_status' => $request->brochurs_status,
            'quanity' => $request->quanity,
            'type_of_serves' => $request->type_of_serves,
            'client_feeback' => $request->client_feeback,
            'updates' => $request->updates,
            'remarks' => $request->remarks,
            'statue' => $request->statue,
            'nextFollowUp' => $request->nextFollowUp,
            'visit_date' => $request->visit_date,
            'user_id' => Auth::user()->id,
        ]);

        $this->addLog(auth()->id(), $report->id, 'Company_sales_lead_report', 'تم اضافة تقرير جديد', 'New sales lead report has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companySalesTeamReports.show', [$request->company->id , $request->mother_company_id]));
    }

    public function visitReport($request){
        if (Auth::user()->hasRole('ADMIN')){
            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
            $query = $this->sales_lead_report_model::whereNotNull('visit_date');
        }
        elseif(Auth::user()->hasRole('Sales Manager')){
            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();

            $query = $this->sales_lead_report_model::whereHas('company' , function ($q){
                $q->whereIn('sector_id' , Auth::user()->sectors->pluck('id'));
            });
        }
        else{
            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();
            $query = Auth::user()->company_sales_lead_report();
        }

        if ($request->representative_id)
            $query->where('user_id' , $request->representative_id);

        if ($request->from)
            $query->where('visit_date' , '>=' , $request->from);

        if ($request->to)
            $query->where('visit_date' , '<=' , $request->to);

        $data['reports'] = $query->paginate(10);
        $data['count'] = $query->count();
        return $data;
    }

    public function getSalesReportdetails($report_id){
        return $this->sales_lead_report_model::findOrFail($report_id);
    }


    public function updateCompanySalesTeamReports($request , $report)
    {
        $report->update([
            'cat_of_req' => $request->cat_of_req,
            'company_id' => $report->company_id,
            'brochurs_status' => $request->brochurs_status,
            'quanity' => $request->quanity,
            'type_of_serves' => $request->type_of_serves,
            'client_feeback' => $request->client_feeback,
            'updates' => $request->updates,
            'remarks' => $request->remarks,
            'statue' => $request->statue,
            'nextFollowUp' => $request->nextFollowUp,
            'visit_date' => $request->visit_date,
            'user_id' => Auth::user()->id,
        ]);

        $this->addLog(auth()->id(), $report->id, 'Company_sales_lead_report', 'تم تعديل  تقرير مبيعات  ', 'Sales lead report has been updated');
        Alert::success('success', trans('dashboard. added successfully'));

        return redirect(route('companySalesTeamReports.show', [$report->company_id , $request->mother_company_id]));

    }
}
