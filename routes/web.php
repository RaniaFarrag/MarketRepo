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


    
});




