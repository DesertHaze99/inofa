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
    
    public function signUp( request $newSignuUp  )
    {
        $this->validate($newSignuUp,[
            'display_name' => 'required',
            'profile_picture' => 'required',
            'id' => 'required',
            'email' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $dataPengguna = Pengguna::all();
            foreach($dataPengguna as $data){
                if($data->email == $newSignuUp->email){
                    return "Akun Anda sudah terdaftar";
                }
            }

            $newUser = new Pengguna;
            $newUser->display_name = $newSignuUp->display_name;
            $newUser->profile_picture = $newSignuUp->profile_picture;
            $newUser->id = $newSignuUp->id;
            $newUser->email = $newSignuUp->email;
            $newUser->save();
            DB::commit();

            return "SignUp berhasil dilakukan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat sign up";
        }

    }
    
    public function userLogedIn($email)
    {
        $user = Pengguna::where('email', $email)->first();
        
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

    public function deleteUser($email)
    {
        $pengguna = Pengguna::where('email','=',$email);
        $pengguna->status = 0;
        $pengguna->save();

        return "Data telah berhasil dihapus";
    }

    public function updateUser($email, Request $request)
    {
        $this->validate($request,[
        ]);

        DB::beginTransaction();
        try {
            $pengguna = Pengguna::where('email', '=', $email)->first();
            $pengguna->display_name = $request->display_name;
            $pengguna->profile_picture = $request->profile_picture;
            $pengguna->pendidikan = $request->pendidikan;
            $pengguna->tgl_lahir = $request->tgl_lahir;
            $pengguna->website = $request->website;
            $pengguna->no_telp = $request->no_telp;
            $pengguna->short_desc = $request->short_desc;
            $pengguna->save();
            DB::commit();

            return "Data pengguna telah berhasil diupdate";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mengupdate data pengguna";
        }
    }
    
    public function addPhoneNumber($email, Request $request)
    {
        $this->validate($request,[
            'no_telp' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $pengguna = Pengguna::where('email', '=', $email)->first();
            $pengguna->no_telp = $request->no_telp;
            $pengguna->save();
            DB::commit();

            return "Nomor telepon berhasil ditambahkan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambahkan nomor telepon";
        }
    }
    
    public function setLocation($email, request $requestLoc )
    {
        $this->validate($requestLoc,[
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $userLoc = Pengguna::where('email','=', $email)->first();
            $userLoc->longitude = $requestLoc->longitude;
            $userLoc->latitude = $requestLoc->latitude;
            $userLoc->save();
            DB::commit();

            return "Lokasi berhasil ditambahkan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambahkan lokasi";
        }
    }

    public function getLocation($email)
    {
        $userLoc = Pengguna::where('email', '=', $email)->first();

        $loc = [ $userLoc->longitude , $userLoc->latitude ];

        return $loc;
    }

    public function sendChat(request $request)
    {
        $this->validate($request,[
            'content' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $chat = new Chats;
            $chat->pengguna_id = $request->pengguna_id;
            $chat->inovasi_id = $request->inovasi_id;
            $chat->content = $request->content;
            $chat->status = 1;
            $chat->save();
            DB::commit();

            return "Chat berhasil dikirim";
        } catch (Exception $e) {
            DB::rollback();

            return "Chat gagal dikirim";
        }
    }
    
    public function deleteChat($id_chat)
    {

        DB::beginTransaction();
        try {
            $chat = Chats::find($id_chat);
            $chat->status = 0;
            $chat->save();
            DB::commit();

            return "Chat berhasil dihapus";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menghapus chat";
        }
    }
    
    public function createInovasi(request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $inovasi = new Inovasi;
            $inovasi->pengguna_id = $request->pengguna_id;
            $inovasi->judul = $request->judul;
            $inovasi->tagline = $request->tagline;
            $inovasi->kategori_id = $request->kategori_id;
            $inovasi->description = $request->description;
            $inovasi->thumbnail = $request->thumbnail;
            $inovasi->save();
            DB::commit();
            
            return "Inovasi berhasil dibuat";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat membuat Inovasi baru";
        }
    }
    
    public function updateInovasi($id_inovasi, request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $inovasi = Inovasi::where('id_inovasi', '=', $id_inovasi)->first();
            $inovasi->pengguna_id = $request->pengguna_id;
            $inovasi->judul = $request->judul;
            $inovasi->tagline = $request->tagline;
            $inovasi->kategori_id = $request->kategori_id;
            $inovasi->description = $request->description;
            $inovasi->thumbnail = $request->thumbnail;
            $inovasi->save();
            DB::commit();
            
            return "Inovasi berhasil diupdate";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mengupdate Inovasi";
        }
        
    }
    
    public function deleteInovasi($id_inovasi)
    {

        DB::beginTransaction();
        try {
            $inovasi = Inovasi::find($id_inovasi);
            $inovasi->status = 0;
            $inovasi->save();
            DB::commit();
            
            return "Inovasi berhasil dihapus";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menghapus Inovasi";
        }
    }
    
    public function pendidikan()
    {
        $pendidikan = Pendidikan::all();

        return $pendidikan;
    }
}
