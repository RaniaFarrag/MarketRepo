<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\SectorRepositoryInterface;
use App\Models\Country;
use App\Models\Sector;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;


class SectorRepository implements SectorRepositoryInterface
{
    use LogTrait;

    protected $sector_model;


    public function __construct(Sector $sector)
    {
        $this->sector_model = $sector;

    }

    /** View All sectors */
    public function index(){
        return $this->sector_model->paginate(20);
        //return $this->sector_model->w(20);
    }

    /** Store Sector */
    public function store($request)
    {
        $sector = $this->sector_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
        ]);

        $this->addLog(auth()->id() , $sector->id , 'sectors' , 'تم اضافة قطاع جديد' , 'New Sector has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('sectors.index'));

    }


    /** Submit Edit Sector */
    public function update($request , $sector){

        $sector->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
        ]);

        $this->addLog(auth()->id() , $sector->id , 'sectors' , 'تم تعديل قطاع ' , 'Sector has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('sectors.index'));

    }

    /** Delete Sector */
    public function destroy($sector){
        $sector->delete();

        $this->addLog(auth()->id() , $sector->id , 'sectors' , 'تم حذف قطاع ' , 'Sector has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('sectors.index'));
    }

}