<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface RoleRepositoryInterface
{

    /** View All Roles */
    public function index();

    /** View Add Role Form */
    public function create();

    /** Store Role */
    public function store($request);

    /** View Edit Role Form */
    public function edit($id);

    /** Submit Edit Role */
    public function update($request , $id);

    /** Delete Role */
    public function destroy($id);

}