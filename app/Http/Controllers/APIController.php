<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use App\Pengguna;
use App\Inovasi;
use App\Kategori;
use App\Kemampuan;
use App\Chats;
use App\Pendidikan;

class APIController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Pengguna::all();
    }
    
    public function signUp( request $request  )
    {
        $newUser = new Pengguna;
        $newUser->display_name = $request->display_name;
        $newUser->profile_picture = $request->profile_picture;
        $newUser->id = $request->id;
        $newUser->email = $request->email;
        $newUser->save();
        
        return "Data berhasil ditambahkan";
    }
    
    public function userLogedIn($display_name)
    {
        $user = Pengguna::where('display_name', $display_name)->first();
        
        return $user;
    }
    
    public function chategoryList()
    {
        $kategori = Kategori::all();
        
        return $kategori;
    }
    
    public function kemmpuanList()
    {
        $kemampuan = Kemampuan::all();
        
        return $kemampuan;
    }

    public function deleteUser($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();

        return "Data telah berhasil dihapus";
    }
    
    public function setLocation($display_name, request $request)
    {
        $userLoc = Pengguna::where('display_name', '=', $display_name);
        $userLoc->longitude = $request->longitude;
        $userLoc->latitude = $request->latitude;
        $userLoc->save();

        return "Lokasi berhasil ditambahkan";
    }

    public function getLocation($display_name)
    {
        $userLoc = Pengguna::where('display_name', '=', $display_name)->first();

        $loc = [ $userLoc->longitude , $userLoc->latitude ];

        return $loc;
    }

    public function sendChat(request $request)
    {
        $chat = new Chats;
        $chat->pengguna_id = $request->pengguna_id;
        $chat->inovasi_id = $request->inovasi_id;
        $chat->content = $request->content;
        $chat->status = 1;
        $chat->save();

        return "Chat berhasil dikirim";
    }
    
    public function deleteChat($id_chat)
    {
        $chat = Chats::find($id_chat);
        $chat->status = 0;
        $chat->save();

        return "Chat berhasil di hapus";
    }
    
    public function createInovasi(request $request)
    {
        $inovasi = new Inovasi;
        $inovasi->pengguna_id = $request->pengguna_id;
        $inovasi->judul = $request->judul;
        $inovasi->tagline = $request->tagline;
        $inovasi->kategori_id = $request->kategori_id;
        $inovasi->description = $request->description;
        $inovasi->thumbnail = $request->thumbnail;
        $inovasi->save();

        return "Inovasi berhasil dibuat";
    }
    
    public function deleteInovasi($id_inovasi)
    {
        $inovasi = Inovasi::find($id_inovasi);
        $inovasi->status = 0;
        $inovasi->save();

        return "Inovasi berhasil di hapus";
    }
    
    public function pendidikan()
    {
        $pendidikan = Pendidikan::all();

        return $pendidikan;
    }
}
