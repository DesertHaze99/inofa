<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use App\DetailPengguna;
use App\Pengguna;
use App\Inovasi;

class APIController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return DetailPengguna::all();
    }

    public function create(request $request)
    {
        $pengguna = new Pengguna;
        $pengguna->added_by = '';
        $pengguna->save();

        $detailPengguna = new DetailPengguna;
        $detailPengguna->pengguna_id = $pengguna->id_pengguna;
        $detailPengguna->username = $request->username;
        $detailPengguna->password = $request->password;
        $detailPengguna->profile_picture = $request->profile_picture;
        $detailPengguna->pendidikan = $request->pendidikan;
        $detailPengguna->pengalaman_kerja = $request->pengalaman_kerja;
        $detailPengguna->first_name = $request->first_name;
        $detailPengguna->last_name = $request->last_name;
        $detailPengguna->email = $request->email;
        $detailPengguna->tgl_lahir = $request->tgl_lahir;
        $detailPengguna->website = $request->website;
        $detailPengguna->no_telp = $request->no_telp;
        $detailPengguna->short_desc = $request->short_desc;
        $detailPengguna->location = $request->location;
        $detailPengguna->rating = $request->rating;
        $detailPengguna->save();

        return "Data berhasil ditambahkan";
    }

    public function delete($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();

        foreach(DetailPengguna::all() as $data)
        {
            if($data->pengguna_id == $id){
                $detailPengguna = DetailPengguna::find($data->id_detail_pengguna);
                $detailPengguna->delete();
            }
        }

        return "Data telah berhasil dihapus";
    }

    
}
