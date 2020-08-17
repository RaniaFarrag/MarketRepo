<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $countryRepositoryinterface;

    public function __construct(CountryRepositoryInterface $countryRepositoryinterface)
    {
        $this->countryRepositoryinterface = $countryRepositoryinterface;
    }

    /** View All countries */
    public function index()
    {
        $countries = $this->countryRepositoryinterface->index();

        return view('system.countries.index')->with('countries' , $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        return $this->countryRepositoryinterface->store($request);
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
    public function edit(Country $country)
    {
        return view('system.countries.edit')->with('country' , $country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        return $this->countryRepositoryinterface->update($request , $country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        return $this->countryRepositoryinterface->destroy($country);
    }
}
