<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $rolerepositoryinterface;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(RoleRepositoryInterface $roleRepositoryinterface)
    {
        $this->rolerepositoryinterface = $roleRepositoryinterface;

    }

    /** View All Roles */
    public function index()
    {
        $roles = $this->rolerepositoryinterface->index();
        return view('system.roles.index')->with('roles' , $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View Add Role Form */
    public function create()
    {
        $permissions = $this->rolerepositoryinterface->create();
        return view('system.roles.create')->with('permissions' , $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store Role */
    public function store(RoleRequest $request)
    {
        return $this->rolerepositoryinterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** View Edit Role Form */
    public function edit(Role $role)
    {
        //dd($role);
        $permissions = $this->rolerepositoryinterface->edit();
        return view('system.roles.edit')->with(['role' => $role , 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit Role */
    public function update(RoleRequest $request, Role $role)
    {
        return $this->rolerepositoryinterface->update($request , $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Delete Role */
    public function destroy(Role $role)
    {
        return $this->rolerepositoryinterface->destroy($role);
    }
}
