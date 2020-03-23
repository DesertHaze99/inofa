<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API for Google Account
Route::post('signUp', 'APIController@signUp'); // API signUp
Route::get('login/{email}', 'APIController@userLogedIn'); // API login

//API kategori
Route::get('kategori', 'APIController@chategoryList');

//API kemampuan
Route::get('kemampuan', 'APIController@kemmpuanList');

//API pengguna
Route::get('pengguna', 'APIController@index'); // list pengguna
Route::post('pengguna', 'APIController@create'); // create user
Route::post('/pengguna/{email}', 'APIController@updateUser'); // update specific user
Route::post('/hapus/{email}', 'APIController@deleteUser'); // delete specific user

//API location
Route::post('setLocation/{email}', 'APIController@setLocation'); // set user location
Route::get('getLocation/{email}', 'APIController@getLocation'); // get user location

//API chat
Route::post('send', 'APIController@sendChat'); // send Chat
Route::post('/chat/{id_chat}', 'APIController@deleteChat'); // delete a chat

//API inovasi
Route::post('createInovasi', 'APIController@createInovasi'); // create new inovasi (group chat)
Route::post('/deleteInovasi/{id_inovasi}', 'APIController@deleteInovasi'); // delete inovasi (group chat)
Route::post('/updateInovasi/{id_inovasi}', 'APIController@updateInovasi'); // update specific inovasi ( group chat)

//API pendidikan
Route::get('pendidikan', 'APIController@pendidikan'); // get user location

//API tambah nomor telepon
Route::post('/noTelp/{email}', 'APIController@addPhoneNumber'); // update specific user
