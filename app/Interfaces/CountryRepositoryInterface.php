<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CountryRepositoryInterface
{

    /** View All countries */
    public function index();

    /** Store Role */
    public function store($request);


    /** Submit Edit country */
    public function update($request , $country);

    /** Delete country */
    public function destroy($country);

}