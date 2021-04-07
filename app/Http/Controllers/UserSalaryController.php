<?php

namespace App\Http\Controllers;

use App\Models\UserSalary;
use App\Traits\logTrait;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserSalaryController extends Controller
{
    use LogTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::where('active' , 1)->with('userSalary')->get();

        return view('system.salaries.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('active' , 1)->with('userSalary')->get();

        return view('system.salaries.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'salary' => 'required',
            'visit_price' => 'required',
        ]);

        $user_salary = UserSalary::updateOrCreate(
            ['user_id' => $request->user_id],
            [
            'user_id' => $request->user_id,
            'salary' => $request->salary,
            'visit_price' => $request->visit_price,
            'num_visits_per_day' => ($request->salary / 26) / $request->visit_price,
        ]);

        $this->addLog(auth()->id() , $user_salary->id , 'userSalary' , 'تم اضافة راتب شهري ' , 'User Salary has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('usersalaries.index'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userSalary_id)
    {
        $userSalary = UserSalary::where('user_id',$userSalary_id)->first();

        $userSalary->delete();
        $this->addLog(auth()->id() , $userSalary->id , 'userSalary' , 'تم حذف راتب شهري' , 'User Salary has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('usersalaries.index'));

    }
}
