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

}
