<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;
use DateTime;

use Carbon\Carbon;
use App\Inovasi;
use App\Pengguna;
use App\Chats;
use App\Kategori;
use App\Subscription;
use App\Wilayah;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $timestamp = explode(" ", now())[0];
        $timestamp=$timestamp." 00:00:00";


        $pengguna = Pengguna::where('id_pengguna','!=', -1)->get();
        $jmlPengguna = count($pengguna);
        $jmlPenggunaNew = count(Pengguna::where('created_at', '>', $timestamp)->get());

        $group = Inovasi::all();
        $jmlGroup = count($group);
        $jmlGroupNew = count(Inovasi::where('created_at', '>', $timestamp)->get());

        $diskusi = Chats::where('pengguna_id', '!=', -1)->get();
        $jmlDiskusi = count($diskusi);
        $jmlDiskusiNew = count(Chats::where('created_at', '>', $timestamp)->where('pengguna_id', '!=', -1)->get());

        $kategori = Kategori::all();

        $dataPengguna = Pengguna::where('id_pengguna','!=', -1)
                    ->orderBy('created_at','DESC')
                    ->limit(11)->get();

        $wilayah = Wilayah::orderBy('jumlah', 'DESC')->limit(5)->get();

        $warna[0]="bg-myBlue";
        $warna[1]="bg-myOrange";
        $warna[2]="bg-myPink";
        $warna[3]="bg-darkBlue";
        $warna[4]="bg-myTeal";

    	return view('dashboard.index', compact('jmlPengguna', 'jmlGroup', 'jmlDiskusi', 'kategori', 'dataPengguna', 'jmlPenggunaNew', 'jmlGroupNew', 'jmlDiskusiNew', 'wilayah', 'warna'));
    }




    public function inovasi()
    {
    	return view('dashboard.inovasiIndex');
    }

    
}