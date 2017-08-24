<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('importExport', 'ImportExcelController@importExport');

Route::get('downloadExcel/{type}', 'ImportExcelController@downloadExcel');

Route::post('importExcel', 'ImportExcelController@importExcel');

