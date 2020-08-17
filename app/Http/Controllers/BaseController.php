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
