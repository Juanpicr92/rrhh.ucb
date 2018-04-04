<?php

Route::get('/', function () {
    return view('auth.login');
});
Route::get('importExport/preview', 'ImportExcelController@getAuxImport')->name('datatable.preview');
Route::get('importExport', 'ImportExcelController@importExport')->name('importExport');


Route::get('downloadExcel/{type}', 'ImportExcelController@downloadExcel');

Route::post('importExcel', 'ImportExcelController@importExcel');
Route::post('importExport/setGestionMes', 'ImportExcelController@setGestionMes');
Route::post('api/FinishExcel', 'ImportExcelController@finishExcel');
Route::post('api/verificarmatched', 'ImportExcelController@verificarmatched');
Route::post('api/jaro/{id_excel}', 'PersonaController@Ajax_Jaro');
Route::get('api/personaExcel/{id}', 'PersonaController@getExcelPerson');
Route::post('api/correctperson', 'PersonaController@correctPerson');
Route::post('api/getListadoRotacion', 'ReportesController@getListadoRotacion');
Route::post('api/getYear', 'ReportesController@getYear');



Auth::routes();

Route::resource('persona', 'PersonaController');
Route::resource('rotacion', 'RotacionController');
Route::get('/rotacionTable', 'RotacionController@getTable')->name('datatable.rotacion');
Route::post('persona/store','PersonaController@store');
Route::resource('reporte', 'ReportesController');
Route::get('/task', 'PersonaController@getTasks')->name('datatable.tasks');

