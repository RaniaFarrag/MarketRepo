<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LogController extends Controller
{


    public function monitorReport(Request $request)
    {
        $roles = Role::all();
        $users = User::all();
        $logs = $this->getLogs($request);

        if ($request->ajax()) {
            return view('system.reports.monitor_auth_report_partial')->with(['logs' => $logs])->render();
        }

        return view('system.reports.monitor_auth_report')->with(['logs' => $logs, 'roles' => $roles, 'users' => $users]);
    }

    public function getLogs(Request $request)
    {
        $query = Log::query();

        if ($request->role) {
            $query = $query->whereHas('user',function ($q) use ($request){
                $q->whereHas('roles',function($l) use ($request){
                    $l->where('name',$request->role);
                });
            });
        }

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->from_date) {
            $query->whereDate('created_at', '>=', Carbon::parse($request->from_date));
        }

        if ($request->to_date) {
            $query->whereDate('created_at', '<=', Carbon::parse($request->to_date));
        }

        return $query->orderBy('created_at' , 'desc')->paginate(15);

    }
}
