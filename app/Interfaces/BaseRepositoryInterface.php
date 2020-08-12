<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface BaseRepositoryInterface
{

    /** Add Country */
    public function addCountry($request);

    /** View All countries */
    public function getAllcountries();

    /** Edit Country Form */
    public function editCountryform($country_id);

    /** Edit Country */
    public function editCountry($request , $country_id);

    /** Delete Country */
    public function deleteCountry($country_id);



}