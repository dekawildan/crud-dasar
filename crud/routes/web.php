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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'CrudController@index');
Route::resource('crud','CrudController');
Route::get('pesan', 'CrudController@index');
Route::get('cari', 'CrudController@index');
Route::post('cari', 'CrudController@caridata');