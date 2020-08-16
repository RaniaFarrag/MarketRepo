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

    /****************************** Manage Countries ***************************/

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


    /******************************* Manage Cities *******************************/

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

    /********************************* Manage Sectors *****************************/

    /** Add Sector */
    public function addSector($request);

    /** View All sectors */
    public function getAllsectors();

    /** Edit Sector Form */
    public function editSectorform($sector_id);

    /** Edit Sector */
    public function editSector($request , $sector_id);


    /** Delete Sector */
    public function deleteSector($sector_id);


}