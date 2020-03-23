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

class InovasiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('inovasi.index');
    }

    public function show($id)
    {

        $inovasi = DB::table('inovasi')
                    ->join('pengguna', 'pengguna.id_pengguna', '=', 'inovasi.pengguna_id')
                    ->where('id_inovasi', '=', $id)
                    ->first();

        $subscription = DB::table('subscription')
                    ->join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                    ->where('subscription.pengguna_id', '=', $id)
                    ->get();

        $dibuatAktif = count(DB::table('inovasi')
                    ->where('pengguna_id', '=', $id)
                    ->where('status', '=', 1)
                    ->get()            
        );
        $dibuatInaktif =count(DB::table('inovasi')
                    ->where('pengguna_id', '=', $id)
                    ->where('status', '=', 0)
                    ->get() 
        );
        
        $bergabungAktif = count(DB::table('subscription')
                    ->join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                    ->where('subscription.pengguna_id', '=', $id)
                    ->where('status', '=', 1)
                    ->get() 
        );

        $bergabungInaktif = count(DB::table('subscription')
                    ->join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                    ->where('subscription.pengguna_id', '=', $id)
                    ->where('status', '=', 0)
                    ->get() 
        );
        

                    
        return view('inovasi.index', compact('inovasi', 'subscription', 'dibuatAktif','dibuatInaktif','bergabungAktif', 'bergabungInaktif')); 
    }



    
    public function detail($id)
    {
        return view('inovasi.index');
    }

    
}
