<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use Spatie\Permission\Models\Role;


class CompanyRepository implements CompanyRepositoryInterface
{
    use LogTrait;

    protected $country_model;
    protected $city_model;
    protected $sector_model;
    protected $sub_sector_model;
    protected $company_model;


    public function __construct(Country $country , City $city , Sector $sector , SubSector $subSector , Company $company)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
        $this->company_model = $company;

    }

    public function create()
    {
        $data = array();
        $data['countries'] = $this->country_model::all();
        $data['cities'] = $this->city_model::all();;
        $data['sectors'] = $this->sector_model::all();;
        $data['sub_sectors'] = $this->sub_sector_model::all();

        return $data;

    }

    /** View All countries */
    public function index(){
        return $this->company_model->paginate(20);
    }

    /** Store Role */
    public function store($request)
    {
        $company = $this->company_model::create([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $company->id , 'countries' , 'تم اضافة دولة جديدة' , 'New Country has been added');

        return redirect(route('countries.index'))->with('success' , trans('dashboard. added successfully'));
    }


    /** Submit Edit Role */
    public function update($request , $company){

        $company->update([
            'name:ar' => $request->name_ar,
            'name:en' => $request->name_en,
            'code' => $request->code,
        ]);

        $this->addLog(auth()->id() , $company->id , 'countries' , 'تم تعديل دولة ' , 'Country has been updated');

        return redirect(route('countries.index'))->with('success' , trans('dashboard.updated successfully'));

    }

    /** Delete Role */
    public function destroy($company){
        $company->delete();
        $this->addLog(auth()->id() , $company->id , 'countries' , 'تم حذف دولة' , 'Country has been deleted');

        return redirect(route('countries.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}