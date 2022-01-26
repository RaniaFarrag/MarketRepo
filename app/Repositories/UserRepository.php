<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\CompanyMeeting;
use App\Models\Log;
use App\Models\MotherCompany;
use App\Models\Sector;
use App\Models\UserSalary;
use App\Traits\logTrait;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class UserRepository implements UserRepositoryInterface
{
    use LogTrait;

    protected $user_model;
    protected $role_model;
    protected $sector_model;
    protected $company_meetings_model;
    protected $motherCompany;


    public function __construct(User $user , Role $role , Sector $sector , CompanyMeeting $companyMeeting , MotherCompany $motherCompany)
    {
        $this->user_model = $user;
        $this->role_model = $role;
        $this->sector_model = $sector;
        $this->company_meetings_model = $companyMeeting;
        $this->motherCompany = $motherCompany;
    }

    /** View All Users */
    public function index(){
        return  $this->user_model->where('id' , '!=' , 13497)->with('roles')->paginate(20);
    }

    /** Get Representative*/
    public function get_reps()
    {
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator') || Auth::user()->hasRole('Assistant G.Manger')){
//            $x = User::whereHas('roles' , function ($q){
////                $q->whereIn('name' , ['Sales Manager' , 'Sales Representative'])->get();
//                $q->where('name' , 'Sales Manager')->orWhere('name' , 'Sales Representative')->get();
//            });

            return $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
        }
        elseif(Auth::user()->hasRole('Sales Manager')){
            return $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->where('parent_id' , Auth::user()->id)
                        ->orWhere('id' , Auth::user()->id);
                })->get();
            //dd($data['representatives']);
        }
        elseif (Auth::user()->hasRole('Sales Representative')){
            //dd($this->user_model::findOrFail(Auth::user()->id));
            return $this->user_model::where('id' , Auth::user()->id)->get();
        }

    }

    /** Create User */
    public function create()
    {
        $data = array();

        $data['sectors'] = $this->sector_model::all();
//        $data['managers'] = $this->user_model::where('active' , 1)->where('parent_id' , null)->get();
        $data['managers'] = $this->user_model::where('active' , 1)->whereHas('roles' , function ($q){
            $q->where('role_id' , 1);
        })->get();
        $data['roles'] = $this->role_model::all();
        $data['motherCompanies'] = $this->motherCompany::all();

        return $data;
    }

    /** Store User */
    public function store($request)
    {

        if ($request->role == 'Sales Representative'){

            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
                'parent_id' => $request->parent_id,
                'mother_company_id' => $request->mother_company_id,
            ]);

            $user->sectors()->sync($request->sector_ids);
        }
        elseif($request->role == 'Sales Manager' || $request->role == 'Coordinator'){
            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
                'mother_company_id' => $request->mother_company_id,
            ]);
            $user->sectors()->sync($request->sector_ids);
//            foreach ($request->sector_ids as $sector_id) {
//                $sector = $this->sector_model::findOrFail($sector_id);
//                $user->sectors()->attach($sector);
//            }
        }
        else{
            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
                'mother_company_id' => $request->mother_company_id,
            ]);
        }
        $user->assignRole($request->role);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم اضافة مستخدم جديد' , 'New User has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('users.index'));

    }

    /** Edit User */
    public function edit()
    {
        $data = array();

        $data['sectors'] = $this->sector_model::all();
//        $data['managers'] = $this->user_model::where('active' , 1)->where('parent_id' , null)->get();
        $data['managers'] = $this->user_model::where('active' , 1)->whereHas('roles' , function ($q){
            $q->where('role_id' , 1);
        })->get();
        $data['roles'] = $this->role_model::all();
        $data['motherCompanies'] = $this->motherCompany::all();

        return $data;
    }


    /** Submit Edit User */
    public function update($request , $user){
        //$user->assignRole('Sales Representative');
        if ($user->hasRole('Sales Representative')){
            if ($request->password){
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'active' => 1,
                    'parent_id' => $request->parent_id,
                    'mother_company_id' => $request->mother_company_id,
                ]);
            }
            else{
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'active' => 1,
                    'parent_id' => $request->parent_id,
                    'mother_company_id' => $request->mother_company_id,
                ]);
            }
            $user->sectors()->sync($request->sector_ids);
        }

        elseif($user->hasRole('Sales Manager') || $user->hasRole('Coordinator')){
            if ($request->password){
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'active' => 1,
                    'mother_company_id' => $request->mother_company_id,
                ]);
            }
            else{
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'active' => 1,
                    'mother_company_id' => $request->mother_company_id,
                ]);
            }

            $user->sectors()->sync($request->sector_ids);
        }

        else{
            if ($request->password){
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'active' => 1,
                    'mother_company_id' => $request->mother_company_id,

                ]);
            }
            else{
                $user->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'active' => 1,
                    'mother_company_id' => $request->mother_company_id,
                ]);
            }
        }

        if($user->roles->pluck('name')[0] != $request->role){
            $childs = User::where('parent_id' , $user->id)->get();
            if(count($childs)){
                Alert::warning('warning', trans('dashboard.This Manager Has Representatives'));
                return redirect(route('users.edit' , $user->id));
            }
            else{
                $user->syncRoles($request->role);
            }
        }
        //$user->removeRole($user->roles->first()->name);
        //$user->assignRole($request->role);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم تعديل مستخدم ' , 'User has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('users.index'));

    }

    /** Delete User */
    public function destroy($user){
        $user->delete();
        $this->addLog(auth()->id() , $user->id , 'users' , 'تم حذف مستخدم' , 'User has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('users.index'));
    }

    public function rep_companies_report($request, $all = null)
    {
        $data =[];
        $data['rep'] = $this->user_model->findOrFail($request->rep_id);
        $data['count_meetings'] = $this->company_meetings_model->where('user_id' , $request->rep_id)->count();
        $data['user_log'] = Log::where('user_id' , $request->rep_id)->where('model_name' , 'users_login')->get();

        if ($all){
            $data['companies'] = $data['rep']->assignedCompanies()
                ->orderBy('confirm_connected','desc')
                ->orderBy('confirm_interview','desc')
                ->orderBy('confirm_need','desc')
                ->orderBy('confirm_contract','desc')
                //->orderBy('created_at','desc')
                ->get();
        }
        else{
            $data['count'] = $data['rep']->assignedCompanies()->count();
            $data['companies'] =  $data['rep']->assignedCompanies()
                ->orderBy('confirm_connected','desc')
                ->orderBy('confirm_interview','desc')
                ->orderBy('confirm_need','desc')
                ->orderBy('confirm_contract','desc')
                //->orderBy('created_at','desc')
                ->paginate(20);
            //dd($data['companies'][0]);
        }

        $data['confirm_connected'] =  $data['rep']->assignedCompanies()->where('confirm_connected',1)->count();
        $data['confirm_interview'] =  $data['rep']->assignedCompanies()->where('confirm_interview',1)->count();
        $data['confirm_need'] =  $data['rep']->assignedCompanies()->where('confirm_need',1)->count();
        $data['confirm_contract'] =  $data['rep']->assignedCompanies()->where('confirm_contract',1)->count();
        return $data;
    }

    /** Active User */
    public function activeUser($request){
        $this->user_model::where('id', $request->user_id)->update([
                    'active' => 1
                ]);
        $this->addLog(auth()->id(), $request->user_id , 'users', 'تم تنشيط مستخدم ', 'user has been actived');
        return trans('dashboard.Activation completed successfully');
    }

    /** Deactivate User */
    public function deactivateUser($request){
        $this->user_model::where('id', $request->user_id)
            ->update([
                'active' => 0
            ]);
        $this->addLog(auth()->id(), $request->user_id , 'users', 'تم تعطيل مستخدم ', 'user has been deactivate');
        return trans('dashboard.DeActivation completed successfully');
    }

    /** Get Count Of Visits & Adding'sCompanies For Every Representative */
    public function getVisitscountReport($request){
//      $start_date = Carbon::now()->subMonth()->startOfMonth()->toDateString();   get from first day in last month
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date = Carbon::now()->toDateString();
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator') || Auth::user()->hasRole('Assistant G.Manger'))
            $representative = User::where('active' , 1)->whereNotNull('parent_id')->orderBy('id' , 'asc')->get();
        else
            $representative = User::where('active' , 1)->where('parent_id' , Auth::user()->id)->get();
        //$representative = User::where('active' , 1)->whereNotNull('parent_id')->orderBy('id' , 'asc')->get();
        $representative_id = $representative[0]->id;
        if (app()->getLocale() == 'ar')
            $representative_name = $representative[0]->name;
        else
            $representative_name = $representative[0]->name_en;

        if ($request->from){
            $start_date = $request->from;
        }

        if ($request->to){
            $end_date = $request->to;
        }

        if ($request->representative_id){
            $representative_id = $request->representative_id;
            $representative = User::findOrFail($request->representative_id);
            if (app()->getLocale() == 'ar')
                $representative_name = $representative->name;
            else
                $representative_name = $representative->name_en;
        }

        $period = CarbonPeriod::create($start_date , $end_date);

        foreach ($period as $date) {
            $listOfDates[] = $date->format('Y-m-d');
        }
        $sum_added = 0;
        $sum_visited = 0;
        $representative_salary = UserSalary::where('user_id' , $representative_id)->first();
        foreach ($listOfDates as $k=>$date) {
            $added_count = Company::where('user_id' , $representative_id)->whereDate('created_at' , $date)->count();
            $visit_count = Company_sales_lead_report::where('user_id' , $representative_id)
                ->where('visit_date' , $date)->count();
            $listofCounts[$k]['date'] = $date;
            $listofCounts[$k]['added'] = $added_count;
            $listofCounts[$k]['visited'] = $visit_count;

            $sum_added += $added_count;
            $sum_visited += $visit_count;

            $chart_array1[$k]['label'] = $date;
            $chart_array1[$k]['y'] = $added_count;

            $chart_array2[$k]['label'] = $date;
            $chart_array2[$k]['y'] = $visit_count;
        }

        $data['listofCounts'] = $listofCounts;
        $data['representative_name'] = $representative_name;
        $data['chart_array1'] = $chart_array1;
        $data['chart_array2'] = $chart_array2;

        $data['sum_added'] = $sum_added;
        $data['sum_visited'] = $sum_visited;

        if ($representative_salary){
            $data['salary'] = $representative_salary->salary;
            $data['daily_visits'] = $representative_salary->num_visits_per_day;
            $data['visit_price'] = $representative_salary->visit_price;
        }

        else{
            $data['salary'] = '';
            $data['daily_visits'] = '';
            $data['visit_price'] = '';
        }

        return $data;
    }
}
