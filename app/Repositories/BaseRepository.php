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

    /********************************* Manage Sectors *****************************/


    /** Add Sector */
    public function addSector($request){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
        ])->validate();

        $sector = $this->sector_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
        ]);

        $this->addLog(auth()->id() , $sector->id , 'sectors' , 'تم اضافة قطاع جديد' , 'New Sector has been added');

        return redirect(route('all_sectors'))->with('success' , trans('dashboard.added successfully'));
    }

    /** View All sectors */
    public function getAllsectors(){
        return $sectors =  $this->sector_model::paginate(20);
    }

    /** Edit Sector Form */
    public function editSectorform($sector_id){
        return $sector = $this->sector_model::findOrFail($sector_id);
    }

    /** Edit Sector */
    public function editSector($request , $sector_id){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
        ])->validate();

        $sector = $this->sector_model::findOrFail($sector_id);

        $sector->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
        ]);

        $this->addLog(auth()->id() , $sector->id , 'sectors' , 'تم تعديل قطاع ' , 'Sector has been updated');

        return redirect(route('all_sectors'))->with('success' , trans('dashboard.updated successfully'));
    }

    /** Delete Sector */
    public function deleteSector($sector_id){
        $this->sector_model::findOrFail($sector_id)->delete();

        $this->addLog(auth()->id() , $sector_id , 'sectors' , 'تم حذف قطاع ' , 'Sector has been deleted');

        return redirect(route('all_sectors'))->with('success' , trans('dashboard.deleted successfully'));
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