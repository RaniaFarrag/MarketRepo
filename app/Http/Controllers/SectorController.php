<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Interfaces\SectorRepositoryInterface;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sectorRepositoryinterface;

    public function __construct(SectorRepositoryInterface $sectorRepositoryinterface)
    {
        $this->sectorRepositoryinterface = $sectorRepositoryinterface;
    }

    /** View All Sectors */
    public function index()
    {
        $sectors = $this->sectorRepositoryinterface->index();

        return view('system.sectors.index')->with('sectors' , $sectors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create Sector Form */
    public function create()
    {
        return view('system.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** Store Sector */
    public function store(SectorRequest $request)
    {
        return $this->sectorRepositoryinterface->store($request);
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

    /** Edit Sector Form */
    public function edit(Sector $sector)
    {
        return view('system.sectors.edit')->with('sector' , $sector);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit Sector */
    public function update(SectorRequest $request, Sector $sector)
    {
        return $this->sectorRepositoryinterface->update($request , $sector);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        return $this->sectorRepositoryinterface->destroy($sector);
    }
}
