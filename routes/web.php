<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('locale/{locale}' , function ($locale){
    \Session::put('locale' , $locale);

    return redirect()->back();
})->name('locale');

Route::group(['middleware'=>['auth' , 'locale']] , function (){

    Route::get('/' , 'HomeController@index')->name('home');

    /** Manage Roles */
    Route::resource('roles' , 'RoleController');

    /** Manage Permissions */
    Route::resource('permissions' , 'PermissionController');

    /** Manage Countries */
    Route::resource('countries' , 'CountryController');

    /** Manage Cities */
    Route::resource('cities' , 'CityController');

    /** Manage Sectors */
    Route::resource('sectors' , 'SectorController');

    /** Manage Users */
    Route::resource('users' , 'UserController');

    /** Manage Company */
    Route::resource('companies' , 'CompanyController');

    /** Manage Sub-Sectors */
    Route::get('sub_sectors/index/{sector_id}', [
        'as' => 'sub_sectors.index',
        'uses' => 'SubSectorController@index'
    ]);
    Route::get('sub_sectors/create/{sector_id}' , [
        'as' => 'sub_sectors.create',
        'uses' => 'SubSectorController@create'
    ]);
    //Route::resource('sub_sectors', 'SubSectorController', ['except' => 'index' , 'create']);
    Route::resource('sub_sectors', 'SubSectorController')->except('index' , 'create');

    /** Get Sub-Sectors Of Sector */
    Route::get('/get/sub/sectors/of/sector/{sector_id}' , 'SubSectorController@getSubsectorOfsector')->name('get_sub_sectros_of_sector');

    /** Get Cities Of Country */
    Route::get('/get/cities/of/country/{country_id}' , 'CityController@getCitiesOfcountry')->name('get_cities_of_country');






    //-------------------------------------EXPORT OLD DATA--------------------------------------------------


    /** Export Companies Data */
    Route::get('update/database/companies',function (){
        //$oldData = \App\Models\marking_companies_old::all();
        $oldData = \App\Models\marking_companies_old::with('images')->get();
        //dd($oldData[6]->images[1]->image);

        foreach ($oldData as $value)
        {
            $company= \App\Models\Company::create([
                'id' => $value->id , // add id in fillable
                'logo' => $value->com_photo ,
                'name:ar' => $value->com_name_ar , // Make name null in phpMyAdmin
                'name:en' => $value->com_name_en , // Make name null in phpMyAdmin
                'whatsapp' => $value->com_mobile ,
                'phone' => $value->com_phone ,
                'sector_id' => $value->sector_id ,
                'sub_sector_id' => $value->com_job_category ,
                'country_id' => $value->com_country ,
                'com_city' => $value->city_id ,
                'district' => $value->district ,
                'location' => $value->com_district ,
                'branch_number' => $value->com_branches,
                'num_of_employees' => $value->com_emplyee_nom,
                'website' => $value->com_website ,
                'email' => $value->com_email ,
                'linkedin' => $value->com_linked_in ,
                'twitter' => $value->com_facebook ,
                'company_representative_name' => $value->man_name ,
                'company_representative_job_title' => $value->man_job_title ,
                'company_representative_job_mobile' => $value->man_mobile ,
                'company_representative_job_phone' => $value->man_phone ,
                'company_representative_job_email' => $value->man_email ,
                'hr_director_job_name' => $value->hr_name ,
                'hr_director_job_email' => $value->hr_email ,
                'hr_director_job_mobile' => $value->hr_mobile ,
                'hr_director_job_phone' => $value->hr_phone ,
                'hr_director_job_whatsapp' => $value->hr_whats ,
                'client_status' => $value->client_status ,
                'evaluation_status' => $value->rate ,
                'evaluation_status_user_id' => $value->user_rate ,
                'confirm_connected' => $value->is_called ,
                'confirm_connected_user_id' => $value->is_called_user ,
                'confirm_interview' => $value->is_verified ,
                'confirm_interview_user_id' => $value->is_verified_user ,
                'confirm_need' => $value->confirm_register ,
                'confirm_need_user_id' => $value->confirm_register_user ,
                'confirm_contract' => $value->is_registered ,
                'confirm_contract_user_id' => $value->is_registered_user ,
                'notes' => $value->notes ,

            ]);

            if (count($value->images)){
                //dd($value->id);
                foreach ($value->images as $k=>$image){
                    if(count($value->images) == 1){
                        //dd(4);
                        $company->update([
                            'first_business_card' => $image->image ,
                        ]);
                    }
                    elseif (count($value->images) == 2){
                        //dd(5);
                        $company->update([
                            'first_business_card' => $image->image,
                            'second_business_card' => $image->image,
                        ]);
                    }
                    elseif (count($value->images) ==3){
                        //dd(6);
                        $company->update([
                            'first_business_card' => $image->image,
                            'second_business_card' => $image->image,
                            'third_business_card' => $image->image,
                        ]);
                    }

                }
            }

            $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                'name' => $value->name_1,
                'job_title' => $value->jobTitle_1,
                'mobile' => $value->phone_1,
                'linkedin' => $value->linkedin_1,
                'whatsapp' => $value->whatsApp_1,
                'email' => $value->d_email_1,
                'company_id' => $company->id,
            ]);

            $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                'name' => $value->name_2,
                'job_title' => $value->jobTitle_2,
                'mobile' => $value->phone_2,
                'linkedin' => $value->linkedin_2,
                'whatsapp' => $value->whatsApp_2,
                'email' => $value->d_email_2,
                'company_id' => $company->id,
            ]);

            $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                'name' => $value->name_3,
                'job_title' => $value->jobTitle_3,
                'mobile' => $value->phone_3,
                'linkedin' => $value->linkedin_3,
                'whatsapp' => $value->whatsApp_3,
                'email' => $value->email_3,
                'company_id' => $company->id,
            ]);
        }
    });
});


/** Export Users Data */
Route::get('update/database/users',function (){
    $oldData = \App\Models\users_old::all();

    foreach ($oldData as $value)
    {
        $user= \App\User::create([
            'id' => $value->id , // add id in fillable
            'name' => $value->name ,
            'name_en' => $value->name_en ,
            'email' => $value->email ,
            'password' => $value->password ,
            'active' => $value->active ,
            'country_id' => $value->com_country ,
            'com_city' => $value->city_id ,
            'district' => $value->district ,
            'location' => $value->com_district ,
            'branch_number' => $value->com_branches,
        ]);
    }
});

/** Export Countries Data */
Route::get('update/database/countries',function (){
    $oldData = \App\Models\countries_old::all();

    foreach ($oldData as $value)
    {
        $countries= \App\Models\Country::create([
            'id' => $value->id , // add id in fillable
            'name:ar' => $value->name_ar ,
            'name:en' => $value->name_en ,
            'code' => $value->code ,
        ]);

    }
});

/** Export Cities Data */
Route::get('update/database/cities',function (){
    $oldData = \App\Models\cities_old::all();

    foreach ($oldData as $value)
    {
        $city= \App\Models\City::create([
            'id' => $value->id , // add id in fillable
            'name:ar' => $value->name_ar ,
            'name:en' => $value->name_en ,
            'country_id' => $value->country_id ,
            'code' => $value->code ,
        ]);

    }
});

/** Export Sectors Data */
Route::get('update/database/sectors' , function (){
    $old_sectors = App\Models\Sector_old::all();

    foreach ($old_sectors as $value){
        $sector = \App\Models\Sector::create([
           'id' => $value->id,
           'name:ar' => $value->name,
           'name:en' => $value->name_en,
        ]);
    }
});

/** Export Sub-Sectors Data */
Route::get('update/database/sub/sectors' , function (){
    $old_sub_sectors = App\Models\SubSector_old::all();

    foreach ($old_sub_sectors as $value){
        $sub_sector = \App\Models\SubSector::create([
            'id' => $value->id,
            'sector_id' => $value->sector_id,
            'name:ar' => $value->title,
            'name:en' => $value->title_en,
        ]);
    }
});


