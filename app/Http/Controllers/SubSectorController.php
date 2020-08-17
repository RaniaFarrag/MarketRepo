<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubSectorRequest;
use App\Interfaces\SubSectorRepositoryInterface;
use App\Models\SubSector;
use Illuminate\Http\Request;

class SubSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** View Sub-Sectors Of Specific Sector */

    protected $subsectorRepositoryinterface;

    public function __construct(SubSectorRepositoryInterface $subSectorRepositoryinterface)
    {
        $this->subsectorRepositoryinterface = $subSectorRepositoryinterface;
    }

    /** View Sub-Sectors Of Specific Sector */
    public function index($sector_id)
    {
        $sub_sectors = $this->subsectorRepositoryinterface->index($sector_id);

        return view('system.sub_sectors.index')->with(['sub_sectors' => $sub_sectors , 'sector_id' => $sector_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Create Sub-Sector Form */
    public function create($sector_id)
    {
        return view('system.sub_sectors.create')->with('sector_id' , $sector_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubSectorRequest $request)
    {
       return $this->subsectorRepositoryinterface->store($request);

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

    /** Edit Sub-Sector Form */
    public function edit(SubSector $subSector)
    {
        return view('system.sub_sectors.edit')->with('subSector' ,$subSector);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Submit Edit Sub-Sector */
    public function update(SubSectorRequest $request, SubSector $subSector)
    {
        return $this->subsectorRepositoryinterface->update($request , $subSector);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSector $subSector)
    {
        return $this->subsectorRepositoryinterface->destroy($subSector);
    }
}
