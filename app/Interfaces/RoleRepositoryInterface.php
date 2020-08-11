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

    /** Store Role */
    public function store($request);


    /** Submit Edit Role */
    public function update($request , $role);

    /** Delete Role */
    public function destroy($role);

}