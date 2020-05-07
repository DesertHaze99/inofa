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
Route::post('kemampuan/{id_pengguna}', 'APIController@addKemampuan'); // add kemampuan

//API pengguna
Route::get('pengguna', 'APIController@allPengguna'); // list pengguna
Route::post('pengguna', 'APIController@create'); // create user
Route::post('/pengguna/{email}', 'APIController@updateUser'); // update specific user
Route::post('/hapus/{email}', 'APIController@deleteUser'); // delete specific user

//API location
Route::post('setLocation/{email}', 'APIController@setLocation'); // set user location
Route::get('getLocation/{email}', 'APIController@getLocation'); // get user location

//API chat
Route::post('send/{id_pengguna}', 'APIController@sendChat'); // send Chat
Route::post('/chat/{id_chat}', 'APIController@deleteChat'); // delete a chat
Route::get('/allChat/{id_inovasi}', 'APIController@allChat'); // get all chat from inovasi
Route::post('/read/{id_chat}', 'APIController@read'); // a spesific user read a chat
Route::get('/readby/{id_chat}', 'APIController@readby'); // get all users who read a specific chat



//API inovasi
Route::post('createInovasi', 'APIController@createInovasi'); // create new inovasi (group chat)
Route::post('/deleteInovasi/{id_inovasi}', 'APIController@deleteInovasi'); // delete inovasi (group chat)
Route::post('/updateInovasi/{id_inovasi}', 'APIController@updateInovasi'); // update specific inovasi ( group chat)
Route::get('inovasi', 'APIController@allInovasi'); // get all inovasi
Route::get('member/{id_inovasi}', 'APIController@allMember'); // get semua user yang menjadi anggota grup sebuah inovasi
Route::get('requestMember/{id_inovasi}', 'APIController@requestMember'); // get semua user yang mengirim permintaan bergabung anggota grup sebuah inovasi
Route::post('/join/{id_pengguna}', 'APIController@requestJoin'); // request to join an inovasi(group chat)
Route::post('/grantJoin/{id_pengguna}', 'APIController@grantJoin'); // grant join requestto an inovasi(group chat)
Route::get('/invite/{id_inovasi}', 'APIController@inviteMember'); // membuat invitation untuk bergabung ke inovasi(group chat)


//API pendidikan
Route::get('pendidikan', 'APIController@pendidikan'); // get list pendidikan

//API tambah nomor telepon
Route::post('/noTelp/{email}', 'APIController@addPhoneNumber'); // update specific user


Route::fallback(function(){
    return response()->json([
        'messages' => 'Page Not Found. If error persists, contact info@inofa.com'], 404);
});