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
use App\Models\CompanyUser;
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
        if (Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('Coordinator')){

            $data['representatives'] = $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
        }
        else{
            $data['representatives'] = $this->user_model::where('parent_id' , auth()->id())
                ->orWhere('id' , auth()->id())->get();
        }

        //$data['countries'] = $this->country_model::all();
        //$user = $this->user_model::findOrFail(auth()->id());
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();

        return $data;
    }

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector (Ajax)*/
    public function fetchCompanyData($request)
    {
        if (in_array($request->sector_id , Auth::user()->sectors()->pluck('sector_id')->toArray())){
            $companies = $this->company_model::query();

            if ($request->subSector_id){
                $companies->where('sub_sector_id' , $request->subSector_id);
            }
            else{
                $companies->where('sector_id' , $request->sector_id);
            }

            if ($request->city_id){
                $companies->where('city_id' , $request->city_id)->get();

                //dd($companies);
            }

            elseif($request->country_id){
                $companies->where('country_id' , $request->country_id);
            }

//            $companies->whereNull('representative_id');

            if (Auth::user()->hasRole('Coordinator')) {
                if($request->representatives){

                    $rep = User::findOrFail($request->representatives);

                    $companies->whereDoesntHave('representative' , function ($q) use ($rep){
                        $q->where('company_user.mother_company_id' , $rep->mother_company_id);
                    });
                    return $companies->get();
                }
            }
            else{
                $companies->whereDoesntHave('representative' , function ($q){
                    $q->where('company_user.mother_company_id' , Auth::user()->mother_company_id);
                });
                return $companies->get();
            }
        }

    }

    /** Submit Assign Company To Representative */
    public function submitAssignCompanyToRepresentative($request){
        $representative = $this->user_model::findOrFail($request->representative_id);
        //dd($representative->mother_company_id);

        if ($request->sector_id){
            if (Auth::user()->sectors()->find($request->sector_id)){
                if (Auth::user()->childs()->find($request->representative_id) || $request->representative_id == Auth::user()->id){
                    /** CASE 1 */
                    if ($request->company_ids) {
//                        dd($representative->mother_company_id);
                        if (! $representative->sectors()->find($request->sector_id)){
                            $representative->sectors()->attach($request->sector_id);
                        }
                        foreach ($request->company_ids as $company_id) {
//                            $this->company_model::where('id', $company_id)
//                                ->update(['representative_id' => $request->representative_id]);
                            $company = $this->company_model::findOrFail($company_id);
                            $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));

                            $this->addLog(auth()->id() , $request->representative_id , 'companies_num'.$company_id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');

                        }
                    }
                    /** CASE 2 */
                    elseif ($request->subSector_id){
                        $companies = $this->company_model::where('sub_sector_id', $request->subSector_id)->whereDoesntHave('representative')->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));
//                                $this->company_model::where('id', $company->id)
//                                    ->update(['representative_id' => $request->representative_id]);

                                $this->addLog(auth()->id() , $request->representative_id , 'companies_num '.$company->id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');
                            }
                        }
                        else{
                            Alert::warning('warning', trans('dashboard.There Is No Companies In This Sub-Sector'));
                            return redirect(route('assign_company_to_representative'));
                        }
                    }
                    /** CASE 3 */
                    else{
                        $companies = $this->company_model::where('sector_id', $request->sector_id)->whereDoesntHave('representative')->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));

//                                $this->company_model::where('id', $company->id)
//                                    ->update(['representative_id' => $request->representative_id]);

                                $this->addLog(auth()->id() , $request->representative_id , 'companies_num '.$company->id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');
                            }
                        }
                        else{
                            Alert::warning('warning', trans('dashboard.There Is No Companies In This Sector'));
                            return redirect(route('assign_company_to_representative'));
                        }
                    }
                }
                /*Coordinator*/
                elseif (Auth::user()->hasRole('Coordinator')){
                    /** CASE 1 */
                    if ($request->company_ids) {
//                        dd($representative->mother_company_id);
                        if (! $representative->sectors()->find($request->sector_id)){
                            $representative->sectors()->attach($request->sector_id);
                        }
                        foreach ($request->company_ids as $company_id) {
//                            $this->company_model::where('id', $company_id)
//                                ->update(['representative_id' => $request->representative_id]);
                            $company = $this->company_model::findOrFail($company_id);
                            $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));

                            $this->addLog(auth()->id() , $request->representative_id , 'companies_num'.$company_id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');

                        }
                    }
                    /** CASE 2 */
                    elseif ($request->subSector_id){
                        $companies = $this->company_model::where('sub_sector_id', $request->subSector_id)->whereDoesntHave('representative')->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));
//                                $this->company_model::where('id', $company->id)
//                                    ->update(['representative_id' => $request->representative_id]);

                                $this->addLog(auth()->id() , $request->representative_id , 'companies_num '.$company->id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');
                            }
                        }
                        else{
                            Alert::warning('warning', trans('dashboard.There Is No Companies In This Sub-Sector'));
                            return redirect(route('assign_company_to_representative'));
                        }
                    }
                    /** CASE 3 */
                    else{
                        $companies = $this->company_model::where('sector_id', $request->sector_id)->whereDoesntHave('representative')->get();
                        if(count($companies)){
                            if (! $representative->sectors()->find($request->sector_id)){
                                $representative->sectors()->attach($request->sector_id);
                            }
                            foreach ($companies as $company) {
                                $company->representative()->attach($request->representative_id , array("mother_company_id" => $representative->mother_company_id , 'created_at' => Carbon::now()));

//                                $this->company_model::where('id', $company->id)
//                                    ->update(['representative_id' => $request->representative_id]);

                                $this->addLog(auth()->id() , $request->representative_id , 'companies_num '.$company->id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');
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
        if (Auth::user()->hasRole('ADMIN')){
            return $this->user_model::where('active' , 1)
                ->where(function ($q){
                    $q->whereNotNull('parent_id')
                        ->orWhereHas('childs');
                })->get();
        }
        else{
            return $this->user_model::where('parent_id' , Auth::user()->id)->orWhere('id' , auth()->id())->get();
        }

    }

    /** Get Companies Of Representative */
    public function getCompaniesofRepresentative($representative_id){
//        return $this->company_model::where('representative_id' , $representative_id)->get();
        //dd($representative_id);
        $data = array();
        $data['representative'] = $this->user_model::findOrFail($representative_id);

        $data['rep_companies'] = $this->company_model::whereHas('representative' , function ($q) use ($representative_id , $data){
                                                        $q ->where('user_id' , $representative_id)
                                                            ->where('company_user.mother_company_id' , $data['representative']->mother_company_id);
                                                        })->orderBy('created_at' , 'desc')->get();

        return $data;
    }

    /** Cancel The Company Assignment */
    public function cancelCompanyassignment($company_id , $rep_id){
//        $company = $this->company_model::findOrFail($company_id);

        $company = CompanyUser::where('company_id' , $company_id)->where('user_id' , $rep_id )->first();
        $company->delete();

        Alert::success('success', trans('dashboard.Company assignment has been canceled successfully'));

        return redirect(route('get_companies_of_representative' , $rep_id));

    }

    public function assignOnecompany($request){
        //dd($request->all());
        $company = $this->company_model::findOrFail($request->company_id);
        $representative = User::findOrFail($request->rep_id);
//        dd($representative->mother_company_id);

        $company_user = CompanyUser::where('company_id' , $request->company_id)->where('mother_company_id' , $representative->mother_company_id)->first();

        if($company_user){
            //$company->representative()->sync([$request->rep_id]);
            //$company->representative()->updateExistingPivot([$request->rep_id , 'mother_company_id' => $representative->mother_company_id]);
            $company_user->update([
                'user_id' => $request->rep_id
            ]);
        }
        else{
            $company->representative()->attach($request->rep_id , array('mother_company_id' => $representative->mother_company_id ,
                'created_at' => Carbon::now()));
        }

        $this->addLog(auth()->id() , $request->rep_id , 'companies_num'.$request->company_id , 'تم  اسناد الشركة للمندوب' , 'The company has been assigned to a representative');

        Alert::success('success', trans('dashboard.Successful Assignment Of Companies'));
        return redirect(route('companies.index'));

    }

    public function getRepsofMothercompany($mother_company_id){
        return $this->user_model::where('active' , 1)
            ->where('mother_company_id' , $mother_company_id)
            ->where(function ($q){
                $q->whereNotNull('parent_id')
                    ->orWhereHas('childs');
            })->get();
    }



}