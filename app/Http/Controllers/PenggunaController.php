<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;
use App\DetailPengguna;
use App\Pengguna;
use App\Inovasi;

class PenggunaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pengguna.index');
    }

    public function show($id)
    {
        $detailPengguna = DB::table('detail_pengguna')
                        ->where('id_detail_pengguna', '=', $id)
                        ->first();

        $inovasi = DB::table('inovasi')
                    ->where('pengguna_id', '=', $id)
                    ->get();
                    
        return view('pengguna.index', compact('detailPengguna', 'inovasi')); 
    }

    
    public function detail($id)
    {
        return view('pengguna.index');
    }

    
}
