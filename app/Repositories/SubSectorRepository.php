<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\SubSectorRepositoryInterface;
use App\Models\SubSector;
use App\Traits\logTrait;
use RealRashid\SweetAlert\Facades\Alert;


class SubSectorRepository implements SubSectorRepositoryInterface
{
    use LogTrait;

    protected $sub_sector_model;


    public function __construct(SubSector $subSector)
    {
        $this->sub_sector_model = $subSector;

    }

    /** View Sub-Sectors Of Specific Sector */
    public function index($sector_id){
       return $this->sub_sector_model::where('sector_id' , $sector_id)->paginate(20);
    }

    /** Store Sector */
    public function store($request)
    {
        $sub_sector = $this->sub_sector_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'sector_id' => $request->sector_id,
        ]);

        $this->addLog(auth()->id() , $sub_sector->id , 'sub_sectors' , 'تم اضافة قطاع فرعي جديد' , 'New Sub Sector has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('sub_sectors.index' , $request->sector_id));

    }


    /** Submit Edit Sub-Sector */
    public function update($request , $subSector){

        $subSector->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'sector_id' => $request->sector_id,
        ]);

        $this->addLog(auth()->id() , $subSector->id , 'sub_sectors' , 'تم تعديل قطاع فرعي ' , 'Sub-Sector has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('sub_sectors.index' , $subSector->sector_id));

    }

    /** Delete Sector */
    public function destroy($subSector){
        $subSector->delete();

        $this->addLog(auth()->id() , $subSector->id , 'sub_sectors' , 'تم حذف قطاع فرعي' , 'Sub-Sector has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('sub_sectors.index' , $subSector->sector_id));
    }

    /** Get Sub-Sectors Of Sector */
    public function getSubsectorOfsector($sector_id){
        return $this->sub_sector_model::where('sector_id' , $sector_id)->get();
    }

}