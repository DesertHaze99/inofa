<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;

use Carbon\Carbon;
use App\Inovasi;
use App\Pengguna;
use App\Chats;
use App\Kategori;
use App\Subscription;

class DashboardController extends Controller
{
	//public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    
    public function index()
    {
        $pengguna = Pengguna::all();
        $jmlPengguna = count($pengguna)-1;

        $group = Inovasi::all();
        $jmlGroup = count($group);

        $diskusi = Chats::where('pengguna_id', '!=', -1)->get();
        $jmlDiskusi = count($diskusi);

        $kategori = Kategori::all();

        $dataPengguna = Pengguna::where('id_pengguna','!=', -1)
                    ->orderBy('created_at','ASC')
                    ->limit(16)->get();
    	
    	return view('dashboard.index', compact('jmlPengguna', 'jmlGroup', 'jmlDiskusi', 'kategori', 'dataPengguna'));
    }




    public function inovasi()
    {
    	return view('dashboard.inovasiIndex');
    }

    
}