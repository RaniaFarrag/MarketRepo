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


Route::group(['middleware'=>'auth'] , function (){

    Route::get('/' , 'HomeController@index');

    /** Add New Role */
    Route::resource('add_role' , 'RoleController');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
