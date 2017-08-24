<?php

Route::get('/', function () {
    return view('auth.login');
});
Route::get('importExport', 'ImportExcelController@importExport')->name('importExport');

Route::get('downloadExcel/{type}', 'ImportExcelController@downloadExcel');

Route::post('importExcel', 'ImportExcelController@importExcel');


Auth::routes();

Route::resource('persona', 'PersonaController');
Route::get('/task', 'PersonaController@getTasks')->name('datatable.tasks');
Route::get('/home', 'HomeController@index')->name('home');

