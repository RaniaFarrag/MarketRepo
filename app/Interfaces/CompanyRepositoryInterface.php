<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CompanyRepositoryInterface
{

    /** View All companies */
    public function index();

    /** Create Company */
    public function create();

    /** Store Company */
    public function store($request);


    /** Submit Edit Company */
    public function update($request , $company);

    /** Delete Company */
    public function destroy($company);

}