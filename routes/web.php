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

    /*********************************************** Manage Sectors ****************************************/

        /** Add Sector Form*/
        Route::get('add_sector_form' , 'BaseController@addSectorForm')->name('add_sector_form');

        /** Add Sector */
        Route::post('add_sector' , 'BaseController@addSector')->name('add_sector');

        /** View All Sectors */
        Route::get('all_sectors' , 'BaseController@getAllsectors')->name('all_sectors');

        /** Edit Sector Form */
        Route::get('edit_sector_form/{sector_id}' , 'BaseController@editSectorform')->name('edit_sector_form');

        /** Edit Sector */
        Route::put('edit_sector/{sector_id}' , 'BaseController@editSector')->name('edit_sector');

        /** Delete Sector */
        Route::get('delete_sector/{sector_id}' , 'BaseController@deleteSector')->name('delete_sector');


    /*********************************************** Manage Sub-Sectors ******************************************/

        /** Get All Sub-sectors Of Specific Sector */
        Route::get('get_sub_sectors_of_sector/{sector_id}' , 'BaseController@getSubsectorOfsector')->name('get_sub_sectors_of_sector');

        /** Add Sub-Sector Form */
        Route::get('add_sub_sector_form/{sector_id}' , 'BaseController@addSubsectorForm')->name('add_sub_sector_form');

        /** Add Sub-Sector To Specific Sector */
        Route::post('add_sub_sector' , 'BaseController@addSubsector')->name('add_sub_sector');


});




