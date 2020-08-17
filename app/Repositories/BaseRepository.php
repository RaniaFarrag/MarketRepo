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
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;


class BaseRepository implements BaseRepositoryInterface
{
    use LogTrait;

    protected $country_model;
    protected $city_model;
    protected $sector_model;
    protected $sub_sector_model;


    public function __construct(Country $country , City $city , Sector $sector , SubSector $subSector)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
    }


    /********************************* Manage Sub-Sectors *****************************/

    /** Get All Sub-sectors Of Specific Sector */
    public function getSubsectorOfsector($sector_id){
        return $sub_sectors = $this->sub_sector_model::where('sector_id' , $sector_id)->paginate(20);
    }

    /** Add Sub Sector To Specific Sector */
    public function addSubsector($request){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
        ])->validate();

        $sub_sector = $this->sub_sector_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'sector_id' => $request->sector_id,
        ]);

        $this->addLog(auth()->id() , $sub_sector->id , 'sub_sectors' , 'تم اضافة قطاع فرعي جديد' , 'New Sub Sector has been added');

        return redirect(route('get_sub_sectors_of_sector' , $request->sector_id))->with('success' , trans('dashboard.added successfully'));
    }

}