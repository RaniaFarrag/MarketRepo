<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;


class CityRepository implements CityRepositoryInterface
{
    use LogTrait;

    protected $city_model;
    protected $country_model;


    public function __construct(City $city , Country $country)
    {

        $this->city_model = $city;
        $this->country_model = $country;

    }

    /** View All cities */
    public function index(){
        return $this->city_model->paginate(20);
    }

    /** Create City */
    public function create()
    {
        return $this->country_model::all();
    }

    /** Store City */
    public function store($request)
    {
        $city = $this->city_model::create([
            'country_id'=>$request->country_id,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $city->id , 'cities' , 'تم اضافة مدينة جديدة' , 'New City has been added');

        return redirect(route('cities.index'))->with('success' , trans('dashboard. added successfully'));
    }

    /** Edit City */
    public function edit()
    {
        return $this->country_model::all();
    }


    /** Submit Edit City */
    public function update($request , $city){

        $city->update([
            'country_id'=>$request->country_id,
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);


        $this->addLog(auth()->id() , $city->id , 'cities' , 'تم تعديل مدينة ' , 'City has been updated');

        return redirect(route('cities.index'))->with('success' , trans('dashboard.updated successfully'));

    }

    /** Delete City */
    public function destroy($city){
        $city->delete();
        $this->addLog(auth()->id() , $city->id , 'cities' , 'تم حذف مدينة' , 'City has been deleted');

        return redirect(route('cities.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}