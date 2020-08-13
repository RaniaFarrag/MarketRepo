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


    /** ****************************** */
    /** Add Country */
    public function addCityform();

    /** Add City */
    public function addCity($request);

    /** View All cities */
    public function getAllcities();

    /** Edit City Form */
    public function editCityform($city_id);

    /** Edit City */
    public function editCity($request , $city_id);

    /** Delete City */
    public function deleteCity($city_id);


}