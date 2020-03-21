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



        $mutual = DB::table('mutual_maping')
                ->join('detail_pengguna', 'mutual_maping.follow_to', '=', 'detail_pengguna.pengguna_id')
                ->where('mutual_maping.pengguna_id', '=', $id)
                ->get();

        $i=0;
        


        

                    
        return view('pengguna.index', compact('detailPengguna', 'inovasi', 'subscription', 'dibuatAktif','dibuatInaktif','bergabungAktif', 'bergabungInaktif', 'mutual')); 
    }



    
    public function detail($id)
    {
        return view('pengguna.index');
    }

    
}
