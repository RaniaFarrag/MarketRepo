<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\AssignCompanyRepositoryInterface;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use App\User;
use Carbon\Carbon;
use DateTime;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class AssignCompanyRepository implements AssignCompanyRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $country_model;
    protected $city_model;
    protected $sector_model;
    protected $sub_sector_model;
    protected $user_model;
    protected $company_model;


    public function __construct(User $user ,Country $country , City $city , Sector $sector , SubSector $subSector , Company $company)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
        $this->user_model = $user;
        $this->company_model = $company;
    }

    /** Assign Company To Representative Form */
    public function assignCompanyToRepresentativeForm(){
        $data = array();

        $data['representatives'] = $this->user_model::where('parent_id' , auth()->id())->get();
        $data['countries'] = $this->country_model::all();
        $user = $this->user_model::findOrFail(auth()->id());
        $data['sectors'] = $user->sectors;
        $data['countries'] = $this->country_model::all();

        return $data;
    }

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector (Ajax)*/
    public function fetchCompanyData($request)
    {
        //dd($request->all());
        $user = $this->user_model::findOrFail(auth()->id());

        if (in_array($request->sector_id , $user->sectors()->pluck('sector_id')->toArray())){
            $companies = $this->company_model::query();

            if ($request->subSector_id){
                $companies->where('sub_sector_id' , $request->subSector_id);
            }
            else{
                $companies->where('sector_id' , $request->sector_id);
            }

            if ($request->city_id){
                $companies->where('city_id' , $request->city_id);
            }

            elseif($request->country_id){
                $companies->where('country_id' , $request->country_id);
            }

            $companies->whereNull('representative_id');

            return $companies->get();

        }

    }

    /** Submit Assign Company To Representative */
    public function submitAssignCompanyToRepresentative($request){
        $representative = $this->user_model::findOrFail($request->representative_id);
        //dd($representative);

        if ($request->sector_id){
            if (Auth::user()->sectors()->find($request->sector_id)){
                if (Auth::user()->childs()->find($request->representative_id)){
                    /** CASE 1 */
                    if ($request->company_ids) {
                        if (! $representative->sectors()->find($request->sector_id)){
                            $representative->sectors()->attach($request->sector_id);
                        }
                        foreach ($request->company_ids as $company_id) {
                            $this->company_model::where('id', $company_id)
                                ->update(['representative_id' => $request->representative_id]);
                        }
                    }
                    /** CASE 2 */
                    elseif ($request->subSector_id){
                        $companies = $this->company_model::where('sub_sector_id', $request->subSector_id)->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $this->company_model::where('id', $company->id)
                                     ->update(['representative_id' => $request->representative_id]);
                            }
                        }
                        else{
                            Alert::warning('warning', trans('dashboard.There Is No Companies In This Sub-Sector'));
                            return redirect(route('assign_company_to_representative'));
                        }
                    }
                    /** CASE 3 */
                    else{
                        $companies = $this->company_model::where('sector_id', $request->sector_id)->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $this->company_model::where('id', $company->id)
                                    ->update(['representative_id' => $request->representative_id]);
                            }
                        }
                        else{
                            Alert::warning('warning', trans('dashboard.There Is No Companies In This Sector'));
                            return redirect(route('assign_company_to_representative'));
                        }
                    }
                }
                else{
                    Alert::warning('warning', trans('dashboard.You Do Not Have Authority'));
                    return redirect(route('assign_company_to_representative'));
                }
            }
            else{
                Alert::warning('warning', trans('dashboard.You Do Not Have Authority'));
                return redirect(route('assign_company_to_representative'));
            }
        }
        else{
            Alert::warning('warning', trans('dashboard.You Must Select Sector'));
            return redirect(route('assign_company_to_representative'));
        }
        Alert::success('success', trans('dashboard.Successful Assignment Of Companies'));
        return redirect(route('assign_company_to_representative'));
    }

    /** Get All Representatives */
    public function getAllRepresentatives(){
        return $this->user_model::where('parent_id' , Auth::user()->id)->get();
    }

    /** Get Companies Of Representative */
    public function getCompaniesofRepresentative($representative_id){
        return $this->company_model::where('representative_id' , $representative_id)->get();
    }

    /** Cancel The Company Assignment */
    public function cancelCompanyassignment($company_id){
        //dd($this->company_model::where('id' , $company_id)->get());
        $company = $this->company_model::findOrFail($company_id);

        $company::where('id', $company_id)
            ->update(['representative_id' => null]);

        Alert::success('success', trans('dashboard.Company assignment has been canceled successfully'));

        return redirect(route('get_companies_of_representative' , $company->representative_id));

    }




}