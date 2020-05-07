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

// inovasi
Route::resource('ide','IdeController');

