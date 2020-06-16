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

class GroupController extends Controller
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
        return view('group.index');
    }

    //ajax datatable
    public function groupAjax()
    {
        $data  = Inovasi::join('pengguna', 'inovasi.pengguna_id', '=', 'pengguna.id_pengguna')
                        ->join('kategori', 'id_kategori', '=', 'kategori_id')
                        ->join('wilayah', 'lokasi', '=', 'id_wilayah')
                        ->select('pengguna.id_pengguna','pengguna.display_name','inovasi.*','kategori.*','wilayah.*')
                        ->get();
        //return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button'.$data->id_inovasi.'" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="'.URL::to('/group/'.$data->id_inovasi.'').'" class="btn btn-outline-primary border-transparent">
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
                ->select('chats.*','pengguna.display_name', 'pengguna.profile_picture')
                ->get();

                
        $jumlahAnggota = count(Subscription::where('inovasi_id', '=', $id)->get());
        
        $anggotaGlance = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                    ->select('pengguna.id_pengguna','pengguna.display_name','pengguna.email', 'pengguna.profile_picture','subscription.*')
                    ->where('subscription.inovasi_id', '=', $id)
                    ->where('subscription.status', '=', 'anggota')
                    ->limit(7)
                    ->get();

        $anggota = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                    ->select('pengguna.id_pengguna','pengguna.display_name','pengguna.email', 'pengguna.profile_picture','subscription.*')
                    ->where('subscription.inovasi_id', '=', $id)
                    ->where('subscription.status', '=', 'anggota')
                    ->get();
        
        $anggotaPending = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                    ->select('pengguna.id_pengguna','pengguna.display_name','pengguna.email', 'pengguna.profile_picture','subscription.*')
                    ->where('subscription.inovasi_id', '=', $id)
                    ->where('subscription.status', '=', 'pending')
                    ->get();

        foreach($chats as $key => $value){
            if( empty($value) ){
                $temp = 0;
            } else {
                $temp = $chats[0]->id_pengguna;
            }
        }

        

        return view('group.group', compact('inovasi', 'chats', 'temp', 'jumlahAnggota', 'anggota', 'anggotaGlance', 'anggotaPending')); 
    }



    
    public function detail($id)
    {
        return view('inovasi.index');
    }

    
}
