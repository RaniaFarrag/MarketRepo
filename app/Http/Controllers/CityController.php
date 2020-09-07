<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cityRepositoryinterface;
    public function __construct(CityRepositoryInterface $cityRepositoryinterface)
    {
        $this->cityRepositoryinterface = $cityRepositoryinterface;
    }


    /** View All cities */
    public function index()
    {
        $cities = $this->cityRepositoryinterface->index();
        return view('system.cities.index')->with('cities' , $cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create City */
    public function create()
    {
        $countries =  $this->cityRepositoryinterface->create();
        return view('system.cities.create')->with('countries' , $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store City */
    public function store(CityRequest $request)
    {
        return $this->cityRepositoryinterface->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Edit City */
    public function edit(City $city)
    {
        $countries =  $this->cityRepositoryinterface->edit();
        return view('system.cities.edit')->with(['countries' => $countries , 'city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit city */
    public function update(CityRequest $request, City $city)
    {
        return $this->cityRepositoryinterface->update($request , $city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Delete city */
    public function destroy(City $city)
    {
        return $this->cityRepositoryinterface->destroy($city);
    }

    /** Get Cities Of Country */
    public function getCitiesOfcountry($country_id){
        $cities = $this->cityRepositoryinterface->getCitiesOfcountry($country_id);

        return response()->json(['cities' => $cities]);
    }
}
