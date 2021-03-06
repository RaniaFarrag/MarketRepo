<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class CountryRepository implements CountryRepositoryInterface
{
    use LogTrait;
    //use SweetAlert;

    protected $country_model;


    public function __construct(Country $country)
    {
        $this->country_model = $country;

    }

    /** View All countries */
    public function index(){
        return $this->country_model->paginate(20);
    }

    /** Store Role */
    public function store($request)
    {
        $country = $this->country_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $country->id , 'countries' , 'تم اضافة دولة جديدة' , 'New Country has been added');

        //SweetAlert::message(trans('dashboard. added successfully'));
        //alert()->success(trans('dashboard. added successfully'));
        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('countries.index'));
    }


    /** Submit Edit Role */
    public function update($request , $country){

        $country->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $country->id , 'countries' , 'تم تعديل دولة ' , 'Country has been updated');
        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('countries.index'));

    }

    /** Delete Role */
    public function destroy($country){
        $country->delete();
        $country->cities()->delete();
        $this->addLog(auth()->id() , $country->id , 'countries' , 'تم حذف دولة' , 'Country has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('countries.index'));
    }

}