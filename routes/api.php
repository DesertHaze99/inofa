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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


// API for Google Account
Route::post('signUp', 'API\PenggunaController@register'); // API signUp
Route::get('login/{email}', 'API\PenggunaController@login'); // API login
Route::post('updateProfile/{email}', 'APIController@updateProfile'); // Update profile picture


Route::group(['middleware' => ['auth:api']], function(){
    
    //API kategori
    Route::get('kategori', 'APIController@chategoryList');

    //API kemampuan
    Route::get('kemampuan', 'APIController@kemmpuanList'); // list semua kemampuan
    Route::post('kemampuan/{id_pengguna}', 'APIController@addKemampuan'); // add kemampuan
    Route::get('kemampuan/{id_pengguna}', 'APIController@kemampuanUser'); // kemampuan user

    //API pengguna
    Route::get('pengguna', 'APIController@allPengguna'); // list pengguna
    Route::post('/pengguna/{email}', 'APIController@updateUser'); // update specific user
    Route::post('/hapus/{email}', 'APIController@deleteUser'); // delete specific user
    Route::get('/dibuat/{email}', 'APIController@inovasiDibuat'); // list inovasi yang dibuat user
    Route::get('/subscription/{email}', 'APIController@subscription'); // list inovasi dimana user bergabung

    //API location
    Route::post('setLocation/{email}', 'APIController@setLocation'); // set user location
    Route::get('getLocation/{email}', 'APIController@getLocation'); // get user location
    Route::get('allWilayah', 'APIController@allWilayah'); // get semua propinsi

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
    Route::get('inviteMember/{id_inovasi}', 'APIController@inviteMember'); // get semua user yang diinvite ke sebuah inovasi(group chat)
    Route::get('/invited/{id_pengguna}', 'APIController@invitedToInovasi'); // get inovasi dimana user diinvite
    Route::post('/join/{id_pengguna}', 'APIController@requestJoin'); // request to join an inovasi(group chat)
    Route::post('/grantJoin/{id_pengguna}', 'APIController@grantJoin'); // grant join request an inovasi(group chat)
    Route::post('/invite/{id_pengguna}', 'APIController@sendInvitation'); // mengirim invitation/undangan untuk bergabung ke inovasi(group chat)
    Route::post('/accept/{id_inovasi}', 'APIController@acceptInvitation'); // menerima invitation menjadi member
    Route::post('/addKemampuan/{id_inovasi}', 'APIController@addKemampuanInovasi'); // menambahkan kemampuan terhadap inovasi
    Route::get('/inovasiByKemampuan/{id_inovasi}', 'APIController@inovasiByKemampuan'); // list inovasi berdasarkan kemampuan

    //API pendidikan
    Route::get('pendidikan', 'APIController@pendidikan'); // get list pendidikan

    //API tambah nomor telepon
    Route::post('/noTelp/{email}', 'APIController@addPhoneNumber'); // update specific user
});

Route::fallback(function(){
    return response()->json([
        'messages' => 'Page Not Found. If error persists, contact info@inofa.com'], 404);
});