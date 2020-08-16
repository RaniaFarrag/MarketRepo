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

    /********************************* Manage Sectors *****************************/

    /** Add Country */
    public function addSectorForm()
    {
        return view('system.sectors.create');
    }

    /** Add Sector */
    public function addSector(Request $request){
        return $this->baseRepositoryinterface->addSector($request);
    }

    /** View All sectors */
    public function getAllsectors(){
        $sectors =  $this->baseRepositoryinterface->getAllsectors();

        return view('system.sectors.index')->with('sectors' , $sectors);
    }

    /** Edit Sector Form */
    public function editSectorform($sector_id){
        $sector = $this->baseRepositoryinterface->editSectorform($sector_id);
        return view('system.sectors.edit')->with(['sector' => $sector]);
    }

    /** Edit Sector */
    public function editSector(Request $request , $sector_id){
        return $this->baseRepositoryinterface->editSector($request , $sector_id);
    }


    /** Delete Sector */
    public function deleteSector($sector_id){
        return $this->baseRepositoryinterface->deleteSector($sector_id);
    }


    /********************************* Manage Sub-Sectors *****************************/

    /** Get All Sub-sectors Of Specific Sector */
    public function getSubsectorOfsector($sector_id){
        $sub_sectors = $this->baseRepositoryinterface->getSubsectorOfsector($sector_id);

         return view('system.sub_sectors.index')->with(['sub_sectors' => $sub_sectors , 'sector_id' => $sector_id]);
    }

    /** Add Sub-Sector Form */
    public function addSubsectorForm($sector_id){
        return view('system.sub_sectors.create')->with('sector_id' , $sector_id);
    }

    /** Add Sub Sector To Specific Sector */
    public function addSubsector(Request $request){
        $this->baseRepositoryinterface->addSubsector($request);
    }

}
