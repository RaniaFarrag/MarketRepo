<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;


class BaseRepository implements BaseRepositoryInterface
{
    use LogTrait;

    protected $country_model;
    protected $city_model;


    public function __construct(Country $country , City $city)
    {
        $this->country_model = $country;
        $this->city_model = $city;
    }

    /** Add Country */
    public function addCountry($request){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
        ])->validate();

        $country = $this->country_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $country->id , 'countries' , 'تم اضافة دولة جديدة' , 'New Country has been added');

        return redirect(route('all_countries'))->with('success' , trans('dashboard. added successfully'));


    }

    /** View All countries */
    public function getAllcountries(){
        return $this->country_model::paginate(20);
    }

    /** Edit Country Form */
    public function editCountryform($country_id){
        return $country = $this->country_model::findOrFail($country_id);
    }

    /** Edit Country */
    public function editCountry($request , $country_id){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
        ])->validate();

        $country = $this->country_model::findOrFail($country_id);

        $country->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $country->id , 'countries' , 'تم تعديل دولة ' , 'Country has been updated');

        return redirect(route('all_countries'))->with('success' , trans('dashboard. updated successfully'));

    }

    /** Delete Country */
    public function deleteCountry($country_id){
         $this->country_model::findOrFail($country_id)->delete();

        $this->addLog(auth()->id() , $country_id , 'countries' , 'تم حذف دولة ' , 'Country has been deleted');

        return redirect(route('all_countries'))->with('success' , trans('dashboard. deleted successfully'));
    }


    /** ****************************** */
    /** Add Country */
    public function addCityform()
    {
        return $countries = $this->country_model::all();
    }

    /** Add City */
    public function addCity($request){
        $validator = Validator::make($request->all() , [
            'country_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
        ])->validate();

        $city = $this->city_model::create([
            'country_id'=>$request->country_id,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $city->id , 'cities' , 'تم اضافة مدينة جديدة' , 'New City has been added');

        return redirect(route('all_cities'))->with('success' , trans('dashboard.added successfully'));
    }

    /** View All cities */
    public function getAllcities(){
        return $this->city_model::paginate(20);
    }

    /** Edit City Form */
    public function editCityform($city_id){
        return $this->city_model::findOrFail($city_id);
    }

    /** Edit City */
    public function editCity($request , $city_id){
        $validator = Validator::make($request->all() , [
            'country_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
        ])->validate();
        $city = $this->city_model::findOrFail($city_id);

        $city->update([
            'country_id'=>$request->country_id,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $city->id , 'cities' , 'تم تعديل مدينة ' , 'City has been updated');

        return redirect(route('all_cities'))->with('success' , trans('dashboard.updated successfully'));
    }


    /** Delete City */
    public function deleteCity($city_id){
        $this->city_model::findOrFail($city_id)->delete();

        $this->addLog(auth()->id() , $city_id , 'cities' , 'تم حذف مدينة ' , 'City has been deleted');

        return redirect(route('all_cities'))->with('success' , trans('dashboard.deleted successfully'));
    }


}