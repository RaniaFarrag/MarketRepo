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

Route::get('locale/{locale}' , function ($locale){
    \Session::put('locale' , $locale);

    return redirect()->back();
})->name('locale');

Route::group(['middleware'=>['auth' , 'locale']] , function (){

    Route::get('/' , 'HomeController@index')->name('home');

    /** Manage Roles */
    Route::resource('roles' , 'RoleController');


    /** Manage Countries */
        /** Add Country Form*/
        Route::get('add_country_form' , 'BaseController@addCountryform')->name('add_country_form');
        /** Add Country */
        Route::post('add_country' , 'BaseController@addCountry')->name('add_country');

        /** View All Countries */
        Route::get('all_countries' , 'BaseController@getAllcountries')->name('all_countries');

        /** Edit Country Form */
        Route::get('edit_country_form/{country_id}' , 'BaseController@editCountryform')->name('edit_country_form');
        /** Edit Country */
        Route::put('edit_country{country_id}' , 'BaseController@editCountry')->name('edit_country');

        /** Delete Country */
        Route::get('delete_country/{country_id}' , 'BaseController@deleteCountry')->name('delete_country');

    /** Manage Cities */
});


Auth::routes();

