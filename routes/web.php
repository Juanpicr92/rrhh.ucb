<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('persona', 'PersonaController');
Route::get('/task', 'PersonaController@getTasks')->name('datatable.tasks');
Route::get('/home', 'HomeController@index')->name('home');
