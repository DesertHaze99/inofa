<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use Datatables;
use App\Pengguna;
use App\Pendidikan;
use App\Subscription;
use App\Inovasi;
use App\KemampuanMapping;

class PenggunaController extends Controller
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
        return view('akun.index');
    }

    //ajax datatable
    public function penggunaAjax()
    {
        $data  = Pengguna::join('wilayah', 'pengguna.lokasi', '=', 'wilayah.id_wilayah')->where('pengguna.status','!=',-1)->get();

        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button'.$data->id_pengguna.'" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="'.URL::to('/akun/'.$data->id_pengguna.'').'" class="btn btn-outline-primary border-transparent">
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
        $pengguna = Pengguna::join('wilayah', 'lokasi', '=', 'id_wilayah')
                            ->where('id_pengguna', '=', $id)
                            ->select('pengguna.*','wilayah.propinsi')->first();

        $inovasi = Inovasi::where('pengguna_id', '=', $id)->get();

        $subscription = Subscription::join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                        ->where('subscription.pengguna_id', '=', $id)
                        ->get();

        $pendidikan = Pendidikan::all();

        $dibuatAktif = count(DB::table('inovasi')
                    ->where('pengguna_id', '=', $id)
                    ->where('inovasi.status', '=', 1)
                    ->get()            
        );
        $dibuatInaktif =count(DB::table('inovasi')
                    ->where('pengguna_id', '=', $id)
                    ->where('inovasi.status', '=', 0)
                    ->get() 
        );
        
        $bergabungAktif = count(DB::table('subscription')
                    ->join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                    ->where('subscription.pengguna_id', '=', $id)
                    ->where('inovasi.status', '=', 1)
                    ->get() 
        );

        $bergabungInaktif = count(DB::table('subscription')
                    ->join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                    ->where('subscription.pengguna_id', '=', $id)
                    ->where('inovasi.status', '=', 0)
                    ->get() 
        );

        $kemampuan = KemampuanMapping::join('kemampuan', 'kemampuan_id', '=', 'id_kemampuan')
                                    ->where('pengguna_id', '=', $id)
                                    ->get();

        return view('akun.pengguna.index', 
        compact('pengguna', 'inovasi', 'subscription', 'dibuatAktif','dibuatInaktif',
        'bergabungAktif', 'bergabungInaktif', 'kemampuan', 'pendidikan')); 
    }


    public function detail($id)
    {
        return view('pengguna.index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'display_name' => 'required',
            'website' => 'required',
            'short_desc' => 'required',
            'pendidikan' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $pengguna = Pengguna::find($id);
            $pengguna->display_name = $request->display_name;
            $pengguna->website = $request->website;
            $pengguna->short_desc = $request->short_desc;
            $pengguna->pendidikan = $request->pendidikan;
            $pengguna->email = $request->email;
            $pengguna->no_telp = $request->no_telp;
            $pengguna->save();
            DB::commit();

            return redirect()->route('akun.show', $id)->with('success','Data pengguna berhasil di update');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->route('akun.show', $id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
    
    public function destroy($id, Request $request)
    {
        $this->validate($request,[
        ]);

        DB::beginTransaction();
        try {
            $pengguna = Pengguna::where('id_pengguna', '=', $id)->first();
            $pengguna->status = $request->status;
            $pengguna->save();
            DB::commit();

            return redirect()->route('akun.show', $id)->with('success','Status pengguna berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->route('akun.show', $id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    
}
