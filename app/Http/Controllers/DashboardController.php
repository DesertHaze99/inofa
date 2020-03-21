<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;
use App\Pengguna;
use Carbon\Carbon;
use App\Inovasi;

class DashboardController extends Controller
{
	//public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    
    public function index()
    {
    	
    	return view('dashboard.index');
    }

    //ajax datatable
    public function penggunaAjax()
    {
        $data  = Pengguna::all();

        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('ava',function($data){
                $button = '';
                $button .= '<img src="'.$data->profile_picture.'" >';
                return $button;
            })
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="'.URL::to('/pengguna/'.$data->id_pengguna.'').'" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round"><b><i class="icon-file-presentation"></i></b> Detail</a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }
}