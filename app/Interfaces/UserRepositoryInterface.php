<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface UserRepositoryInterface
{

    /** View All Users */
    public function index();


    /** Get Representative*/
    public function get_reps();


    /** Create User */
    public function create();

    /** Store User */
    public function store($request);

    /** Edit User */
    public function edit();

    /** Submit Edit User */
    public function update($request , $user);

    /** Delete User */
    public function destroy($user);


    /** Representative Report */
    public function rep_companies_report($request);

}
