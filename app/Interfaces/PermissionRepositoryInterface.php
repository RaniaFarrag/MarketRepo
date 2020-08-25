<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface PermissionRepositoryInterface
{

    /** View All Permissions */
    public function index();

    /** Store Permission */
    public function store($request);


    /** Submit Edit Permission */
    public function update($request , $permission);

    /** Delete Permission */
    public function destroy($permission);

}