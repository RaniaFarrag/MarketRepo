<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CityRepositoryInterface
{

    /** View All cities */
    public function index();

    /** Create City */
    public function create();

    /** Store City */
    public function store($request);

    /** Edit City */
    public function edit();

    /** Submit Edit city */
    public function update($request , $city);

    /** Delete city */
    public function destroy($city);

}