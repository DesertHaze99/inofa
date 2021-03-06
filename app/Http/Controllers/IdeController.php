<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;
use App\Chats;
use App\Subscription;
use App\DetailPengguna;
use App\Pengguna;
use App\Inovasi;

class IdeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index(Request $request)
    {
        $data  = Pengguna::join('inovasi', 'pengguna_id', '=', 'id_pengguna')
                        ->join('kategori', 'id_kategori', '=', 'kategori_id')
                        ->select('pengguna.id_pengguna','pengguna.display_name', 'pengguna.profile_picture', 'pengguna.lokasi','inovasi.*','kategori.*')
                        ->get();

        return view('ide.index', compact('data'));
    }

    //ajax datatable
    public function ideAjax()
    {
        $data  = Inovasi::join('pengguna', 'inovasi.pengguna_id', '=', 'pengguna.id_pengguna')
                        ->join('kategori', 'id_kategori', '=', 'kategori_id')
                        ->join('wilayah', 'lokasi', '=', 'id_wilayah')
                        ->select('pengguna.id_pengguna','pengguna.display_name','inovasi.*','kategori.*','wilayah.*')
                        ->get();

        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="'.URL::to('/ide/'.$data->id_inovasi.'').'" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function show($id)
    {

        $inovasi = DB::table('inovasi')
                    ->join('pengguna', 'pengguna.id_pengguna', '=', 'inovasi.pengguna_id')
                    ->join('status','status.id_status', '=', 'inovasi.status')
                    ->where('id_inovasi', '=', $id)
                    ->select('inovasi.*','pengguna.id_pengguna', 'pengguna.id', 'pengguna.display_name', 'pengguna.profile_picture', 'pengguna.email')
                    ->first();

        $chats = Chats::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                ->where('inovasi_id', '=', $id )
                ->get();

                
        $jumlahAnggota = count(Subscription::where('inovasi_id', '=', $id)->get());
        
        $anggota = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                    ->select('pengguna.id_pengguna','pengguna.display_name','pengguna.email', 'pengguna.profile_picture','subscription.*')
                    ->where('subscription.inovasi_id', '=', $id)
                    ->limit(7)
                    ->get();

        foreach($chats as $key => $value){
            if( empty($value) ){
                $temp = 0;
            } else {
                $temp = $chats[0]->id_pengguna;
            }
        }

                    
        return view('inovasi.index', compact('inovasi', 'chats', 'temp', 'jumlahAnggota', 'anggota')); 
    }



    
    public function detail($id)
    {
        return view('inovasi.index');
    }

    
}
