<?php

namespace App\Http\Controllers;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Country;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    protected $baseRepositoryinterface;

    public function __construct(BaseRepositoryInterface $baseRepositoryinterface)
    {
        $this->baseRepositoryinterface = $baseRepositoryinterface;
    }

    /** Add Country */
    public function addCountryform()
    {
        return view('system.countries.create');
    }

    /** Add Country */
    public function addCountry(Request $request){
        return $this->baseRepositoryinterface->addCountry($request);
    }

    /** View All countries */
    public function getAllcountries(){
        $countries = $this->baseRepositoryinterface->getAllcountries();
        return view('system.countries.index')->with('countries' , $countries);
    }

    /** Edit Country Form */
    public function editCountryform($country_id){
        $country = $this->baseRepositoryinterface->editCountryform($country_id);

        return view('system.countries.edit')->with('country' , $country);
    }

    /** Edit Country */
    public function editCountry(Request $request , $country_id){
        return $this->baseRepositoryinterface->editCountry($request , $country_id);

    }

    /** Delete Country */
    public function deleteCountry($country_id){
        return $this->baseRepositoryinterface->deleteCountry($country_id);
    }


    /** ****************************** */

    /** Add Country */
    public function addCityform()
    {
        $countries = $this->baseRepositoryinterface->addCityform();
        return view('system.cities.create')->with('countries' , $countries);
    }

    /** Add City */
    public function addCity(Request $request){
        return $this->baseRepositoryinterface->addCity($request);
    }

    /** View All cities */
    public function getAllcities(){
        $cities =  $this->baseRepositoryinterface->getAllcities();

        return view('system.cities.index')->with('cities' , $cities);
    }

    /** Edit City Form */
    public function editCityform($city_id){
        $city = $this->baseRepositoryinterface->editCityform($city_id);
        $countries = $this->baseRepositoryinterface->addCityform();

        return view('system.cities.edit')->with(['city' => $city , 'countries' => $countries]);
    }

    /** Edit City */
    public function editCity(Request $request , $city_id){
        return $this->baseRepositoryinterface->editCity($request , $city_id);
    }


    /** Delete City */
    public function deleteCity($city_id){
        return $this->baseRepositoryinterface->deleteCity($city_id);
    }

}
