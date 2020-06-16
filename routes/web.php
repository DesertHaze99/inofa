<?php

Auth::routes();
Route::get('/home', 'DashboardController@index')->name('home');

// dashboard
Route::get('/', 'DashboardController@index');

//akun
Route::get('/akun', 'PenggunaController@index');
Route::get('/penggunaAjax','PenggunaController@penggunaAjax');

//ide
Route::get('/ide', 'IdeController@index');
Route::get('/ideAjax','IdeController@ideAjax');

//group
Route::get('/group', 'GroupController@index');
Route::get('/groupAjax','GroupController@groupAjax');


// pengguna
Route::resource('akun','PenggunaController');

// inovasi
Route::resource('group','GroupController');
Route::get('/groupAjax','GroupController@groupAjax');

// ide
Route::resource('ide','IdeController');


