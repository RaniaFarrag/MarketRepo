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

    /** Manage Countries */
    Route::resource('countries' , 'CountryController');

    /** Manage Cities */
    Route::resource('cities' , 'CityController');

    /** Manage Sectors */
    Route::resource('sectors' , 'SectorController');

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

    
});




