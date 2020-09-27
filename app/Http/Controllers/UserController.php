<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $userRepositoryinterface;

    public function __construct(UserRepositoryInterface $userRepositoryinterface)
    {
        $this->userRepositoryinterface = $userRepositoryinterface;

    }

    /** View All Users */
    public function index()
    {
        $users = $this->userRepositoryinterface->index();
        return view('system.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public function update(Request $request, User $user)
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
            $rep = $this->userRepositoryinterface->rep_companies_report($request)['rep'];
            $confirm_connected = $this->userRepositoryinterface->rep_companies_report($request)['confirm_connected'];
            $confirm_interview = $this->userRepositoryinterface->rep_companies_report($request)['confirm_interview'];
            $confirm_need = $this->userRepositoryinterface->rep_companies_report($request)['confirm_need'];
            $confirm_contract = $this->userRepositoryinterface->rep_companies_report($request)['confirm_contract'];
            return view('system.reports.rep_report_partial',compact('companies','confirm_connected','confirm_contract','confirm_interview','confirm_need','rep'))->render();
        }
        return view('system.reports.rep_report', compact('reps'));
    }
}
