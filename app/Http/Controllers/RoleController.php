<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;

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
        return $this->rolerepositoryinterface->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View Add Role Form */
    public function create()
    {
        return $this->rolerepositoryinterface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store Role */
    public function store(Request $request)
    {

        return $this->rolerepositoryinterface->store($request);

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

    /** View Edit Role Form */
    public function edit($id)
    {
       return $this->rolerepositoryinterface->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit Role */
    public function update(Request $request, $id)
    {
        return $this->rolerepositoryinterface->update($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Delete Role */
    public function destroy($id)
    {
        return $this->rolerepositoryinterface->destroy($id);
    }
}
