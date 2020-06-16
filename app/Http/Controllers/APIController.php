<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;
use URL;
use Auth;
use session;
use Exception;
use App\Pengguna;
use App\Inovasi;
use App\Kategori;
use App\Kemampuan;
use App\KemampuanMapping;
use App\InovasiKemampuanMapping;
use App\Chats;
use App\ChatMapping;
use App\Pendidikan;
use App\Subscription;
use App\Wilayah;

class APIController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allPengguna()
    {
        return Pengguna::join('pendidikan','pendidikan.id_pendidikan', '=', 'pengguna.pendidikan')->get();
    }
    
    public function updateProfile($email, request $request  )
    {

        DB::beginTransaction();
        try {
            $user = Pengguna::where('email', '=', $email)->first();


            if($user){
                $response = array();

                $user->id = $user->id;
                $user->display_name = $user->display_name;
                $user->profile_picture = $request->profile_picture;
                $user->email = $email;
                
                if ($user->save()) {
                    DB::commit();
                    $res['message'] = "Foto profil berhasil diperbarui";
                    $res['value'] = "$user";
                    return response($res);
                }
                else{
                    $res['message'] = "Data yang dimasukkan tidak sesuai permintaan";
                    return response($res);
                }
                
            } else {
                
                return "User tidak ditemukan";
            }

           
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mencoba memberbarui foto profil";
        }

    }
    
    public function chategoryList()
    {
        $kategori = Kategori::all();
        
        return $kategori;
    }
    
    public function kemmpuanList()
    {
        $kemampuan = Kemampuan::all();
    
        return $kemampuan;
    }
    
    public function addKemampuan($id_pengguna, Request $request)
    {

        DB::beginTransaction();
        try {
            $kemampuan = new KemampuanMapping;
            $kemampuan->pengguna_id = $id_pengguna;
            $kemampuan->kemampuan_id = $request->kemampuan_id;
            $kemampuan->save();
            DB::commit();

            return "Data kemampuan berhasil ditambahkan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambah data kemampuan";
        }
    }

    public function kemampuanUser($id_pengguna, Request $request)
    {

        DB::beginTransaction();
        try {
            $kemampuan = KemampuanMapping::join('kemampuan', 'kemampuan_mapping.kemampuan_id', '=', 'kemampuan.id_kemampuan')
                                        ->where('pengguna_id', '=', $id_pengguna)
                                        ->get();

            return $kemampuan;
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menampilkan data kemampuan";
        }
    }

    public function deleteUser($email)
    {
        $pengguna = Pengguna::where('email','=',$email);
        $pengguna->status = 0;
        $pengguna->save();

        return "Data telah berhasil dihapus";
    }

    public function updateUser($email, Request $request)
    {
        $this->validate($request,[
        ]);

        DB::beginTransaction();
        try {

            $response = array();
            $display_name = $request->display_name;
            $pendidikan = $request->pendidikan;
            $tgl_lahir = $request->tgl_lahir;
            $website = $request->website;
            $no_telp = $request->no_telp;
            $short_desc = $request->short_desc;

            $pengguna = Pengguna::where('email', '=', $email)->first();
            $pengguna->display_name = $display_name;
            $pengguna->profile_picture = $pengguna->profile_picture;
            $pengguna->pendidikan = $pendidikan;
            $pengguna->tgl_lahir = $tgl_lahir;
            $pengguna->website = $website;
            $pengguna->no_telp = $no_telp;
            $pengguna->short_desc = $short_desc;
            
            if ($pengguna->save()) {
                DB::commit();
                $res['message'] = "Data pengguna berhasil diubah";
                $res['value'] = "$pengguna";
                return response($res);
            }
            else{
                $res['message'] = "Data yang dimasukkan tidak sesuai permintaan";
                return response($res);
            }

        } catch (Exception $e) {
            DB::rollback();
            $res['message'] = "Ada kesalahan saat mengupdate data pengguna";
            return response($res);
        }
    }

    public function inovasiDibuat($email)
    {
        $pengguna = Pengguna::where('email', '=', $email)->first();

        $inovasi = Inovasi::join('pengguna', 'inovasi.pengguna_id', '=', 'pengguna.id_pengguna')
                            ->join('kategori', 'kategori.id_kategori', '=', 'inovasi.kategori_id')
                            ->where('inovasi.pengguna_id','=',$pengguna->id_pengguna)
                            ->select('inovasi.*', 'pengguna.display_name', 'pengguna.profile_picture', 
                            'pengguna.email', 'pengguna.short_desc','kategori.kategori', 'kategori.kategori_thumbnail', 'kategori.warna')
                            ->get();

        return $inovasi;
    }

    public function subscription($email)
    {
        $pengguna = Pengguna::where('email', '=', $email)->first();

        $inovasi = Subscription::join('inovasi', 'subscription.inovasi_id', '=', 'inovasi.id_inovasi')
                                ->join('pengguna', 'subscription.pengguna_id', '=', 'pengguna.id_pengguna')
                                ->join('kategori', 'kategori.id_kategori', '=', 'inovasi.kategori_id')
                                ->where('subscription.pengguna_id','=',$pengguna->id_pengguna)
                                ->where('subscription.status','=', 'anggota')
                                ->select('subscription.*', 'inovasi.judul','inovasi.tagline',
                                'inovasi.description', 'inovasi.thumbnail', 'pengguna.display_name', 
                                'pengguna.profile_picture', 'pengguna.email', 'pengguna.short_desc',
                                'kategori.kategori', 'kategori.kategori_thumbnail', 'kategori.warna')
                                ->get();

        return $inovasi;
    }
    
    public function addPhoneNumber($email, Request $request)
    {
        $this->validate($request,[
            'no_telp' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $pengguna = Pengguna::where('email', '=', $email)->first();
            $pengguna->no_telp = $request->no_telp;
            $pengguna->save();
            DB::commit();

            return "Nomor telepon berhasil ditambahkan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambahkan nomor telepon";
        }
    }
    
    public function setLocation($email, request $requestLoc )
    {
        $this->validate($requestLoc,[
            'longitude' => 'required',
            'latitude' => 'required',
            'lokasi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $userLoc = Pengguna::where('email','=', $email)->first();
            
            if(!empty($userLoc->lokasi)){
              $jmlWilayah = Wilayah::where('id_wilayah', '=', $userLoc->lokasi)->first();
              $jmlWilayah->jumlah-=1;  
              $jmlWilayah->save(); 

              $userLoc->longitude = $requestLoc->longitude;
              $userLoc->latitude = $requestLoc->latitude;
              $userLoc->lokasi = $requestLoc->lokasi;
              $userLoc->save();
              
              $jmlWilayah = Wilayah::where('id_wilayah', '=', $requestLoc->lokasi)->first();
              $jmlWilayah->jumlah+=1;  
              $jmlWilayah->save();
              DB::commit();

              return "Lokasi berhasil ditambahkan";

            } else {
                $userLoc->longitude = $requestLoc->longitude;
                $userLoc->latitude = $requestLoc->latitude;
                $userLoc->lokasi = $requestLoc->lokasi;
                $userLoc->save();
                
                $jmlWilayah = Wilayah::where('id_wilayah', '=', $requestLoc->lokasi)->first();
                $jmlWilayah->jumlah+=1;  
                $jmlWilayah->save();
                DB::commit();

                return "Lokasi berhasil ditambahkan";
            }

            
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambahkan lokasi";
        }
    }

    public function getLocation($email)
    {
        $userLoc = Pengguna::join('wilayah', 'id_wilayah', '=', 'propinsi')->where('email', '=', $email)->first();

        $loc = [ $userLoc->longitude , $userLoc->latitude, $userLoc->propinsi, $userLoc->kabupaten];

        return $loc;
    }

    public function allWilayah()
    {
        $wilayah = Wilayah::select('wilayah.propinsi','wilayah.id_wilayah', 'wilayah.longitude', 'wilayah.latitude')->get();

        return $wilayah;
    }

    public function sendChat( $id_pengguna, request $request)
    {
        $response = array();
        $inovasi_id = $request->inovasi_id;
        $content = $request->content;

        $media = date('dmYHis').str_replace(" ","", basename($_FILES['media']['name']));
        $imagePath = public_path()."/upload/media/".$media;
        $path = "upload/media/".$media;
        move_uploaded_file($_FILES['media']['tmp_name'],$imagePath);

        $chat = new Chats;
        $chat->pengguna_id = $id_pengguna;
        $chat->inovasi_id = $inovasi_id;
        $chat->content = $content;
        $chat->media = $path;
        $chat->status = 1;
        
        if ($chat->save()) {
            DB::commit();
            $res['message'] = "Chat berhasil dikirim";
            $res['value'] = "$chat";
            return response($res);
        }
        else{
            $res['message'] = "Data yang dimasukkan tidak sesuai permintaan";
            return response($res);
        }
    }
    
    public function read( $id_chat, request $request)
    {
        $this->validate($request,[
            'pengguna_id' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $chatMapping = new ChatMapping;
            $chatMapping->pengguna_id = $request->pengguna_id;
            $chatMapping->chat_id = $id_chat;
            $chatMapping->save();
            DB::commit();

            return "Chat terbaca";

        } catch (Exception $e) {
            DB::rollback();

            return "Chat gagal dibaca";
        }
    }
    
    public function readby( $id_chat, request $request)
    {
        $this->validate($request,[
           
        ]);

        DB::beginTransaction();
        try {

            $readby = ChatMapping::join('pengguna', 'id_pengguna', '=', 'pengguna_id')
                    ->where('chat_id', '=', $id_chat)
                    ->get();
                    

            return $readby;

        } catch (Exception $e) {

            return "Ada kesalahan saat mengambil data";
        }
    }
    
    public function allChat( $id_inovasi)
    {

        DB::beginTransaction();
        try {

            $allChat = Chats::join('pengguna', 'id_pengguna', '=', 'pengguna_id')
                    ->where('inovasi_id', '=', $id_inovasi)
                    ->get();
                    
            return $allChat;

        } catch (Exception $e) {

            return "Ada kesalahan saat mengambil data";
        }
    }
    
    public function deleteChat($id_chat)
    {

        DB::beginTransaction();
        try {
            $chat = Chats::find($id_chat);
            $chat->status = 0;
            $chat->save();
            DB::commit();

            return "Chat berhasil dihapus";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menghapus chat";
        }
    }
    
    public function createInovasi(request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $dataInovasi = Inovasi::where('judul', '=', $request->judul)
                                    ->where('pengguna_id', '=', $request->pengguna_id)
                                    ->get();
            if(count($dataInovasi) > 1){
                
                return "Inovasi sudah ada";
            } else {

                $response = array();
                $pengguna_id = $request->pengguna_id;
                $judul = $request->judul;
                $tagline = $request->tagline;
                $kategori_id = $request->kategori_id;
                $description = $request->description;

                $thumbnail = date('dmYHis').str_replace(" ","", basename($_FILES['thumbnail']['name']));
                $imagePath = public_path()."/upload/thumbnail/".$thumbnail;
                $path = "upload/thumbnail/".$thumbnail;
                move_uploaded_file($_FILES['thumbnail']['tmp_name'],$imagePath);

                $inovasi = new Inovasi;
                $inovasi->pengguna_id = $pengguna_id;
                $inovasi->judul = $judul;
                $inovasi->tagline = $tagline;
                $inovasi->kategori_id = $kategori_id;
                $inovasi->description = $description;
                $inovasi->thumbnail = $path;

                if ($inovasi->save()) {
                    DB::commit();
                    $chat = new Chats;
                    $chat->pengguna_id = -1;
                    $chat->inovasi_id = $inovasi->id_inovasi;
                    $chat->content = "Group baru telah dibuat";
                    $chat->status = 1;
                    $chat->save();

                    $kategorijml = Kategori::where('id_kategori', '=', $kategori_id)->first();
                    $kategorijml->jumlah +=1;
                    $kategorijml->save();

                    $res['message'] = "Inovasi baru berhasil dibuat";
                    $res['value'] = "$inovasi";
                    return response($res);
                }
            }

        } catch (Exception $e) {
            DB::rollback();
            $res['message'] = "Ada kesalahan saat membuat Inovasi baru";
            return response($res);
        }
    }
    
    public function updateInovasi($id_inovasi, request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'kategori_id' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $response = array();
            $pengguna_id = $request->pengguna_id;
            $judul = $request->judul;
            $tagline = $request->tagline;
            $kategori_id = $request->kategori_id;
            $description = $request->description;

            $thumbnail = date('dmYHis').str_replace(" ","", basename($_FILES['thumbnail']['name']));
            $imagePath = public_path()."/upload/thumbnail/".$thumbnail;
            $path = "upload/thumbnail/".$thumbnail;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'],$imagePath);

            $inovasi = Inovasi::where('id_inovasi', '=', $id_inovasi)->first();

            $kategorijmllama = Kategori::where('id_kategori', '=', $inovasi->kategori_id)->first();
            $kategorijmllama->jumlah -=1;
            $kategorijmllama->save();

            $inovasi->pengguna_id = $pengguna_id;
            $inovasi->judul = $judul;
            $inovasi->tagline = $tagline;
            $inovasi->kategori_id = $kategori_id;
            $inovasi->description = $description;
            $inovasi->thumbnail = $path;

            if ($inovasi->save()) {
                DB::commit();

                $kategorijml = Kategori::where('id_kategori', '=', $kategori_id)->first();
                $kategorijml->jumlah +=1;
                $kategorijml->save();

                $res['message'] = "Inovasi berhasil diupdate";
                $res['value'] = "$inovasi";
                return response($res);
            }

        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mengupdate Inovasi";
        }
        
    }
    
    public function deleteInovasi($id_inovasi)
    {

        DB::beginTransaction();
        try {
            $inovasi = Inovasi::find($id_inovasi);
            $inovasi->status = 0;
            $inovasi->save();
            DB::commit();
            
            return "Inovasi berhasil dihapus";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menghapus Inovasi";
        }
    }
    
    public function requestJoin($id_pengguna, Request $request)
    {

        DB::beginTransaction();
        try {
            
            $find = Subscription::where('pengguna_id', '=', $id_pengguna)->where('inovasi_id', '=', $request->inovasi_id)->get();

            if(count($find) >= 1 ){
                return abort(404, 'Inovasi tidak ditemukan');
            } else {
                $subs = new Subscription;
                $subs->pengguna_id = $id_pengguna;
                $subs->inovasi_id = $request->inovasi_id;
                $subs->save();
                DB::commit();
                
                return "Permintaan telah  terkirim";
            }
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mencoba bergabung";
        }
    }

    public function sendInvitation($id_pengguna, Request $request)
    {

        DB::beginTransaction();
        try {
            
            $find = Subscription::where('pengguna_id', '=', $id_pengguna)->where('inovasi_id', '=', $request->inovasi_id)->get();

            if(count($find) >= 1 ){
                return "Pengguna sudah bergabung";
            } else {
                $subs = new Subscription;
                $subs->pengguna_id = $id_pengguna;
                $subs->inovasi_id = $request->inovasi_id;
                $subs->join_by = "invitation";
                $subs->save();
                DB::commit();
                
                return "Permintaan telah  terkirim";
            }
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mencoba mengundang teman";
        }
    }
    
    public function grantJoin($id_pengguna, Request $request)
    {

        DB::beginTransaction();
        try {
            $subs = Subscription::where('pengguna_id', '=', $id_pengguna)->where('inovasi_id', '=', $request->inovasi_id)->first();
            if($subs->status == "anggota"){
                return "Pengguna sudah manjadi anggota";
            } else {
                $inovasi = Inovasi::where('id_inovasi', '=', $request->inovasi_id)->first();
                $inovasi->jml_anggota =  $inovasi->jml_anggota + 1;
                $inovasi->save();

                $subs->status = "anggota";
                $subs->save();

                
                DB::commit();
                
                return "Pengguna berhasil bergabung";
            }
            
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mengirim permintaan";
        }
    }
    
    public function acceptInvitation($id_inovasi, Request $request)
    {

        DB::beginTransaction();
        try {
            $subs = Subscription::where('pengguna_id', '=', $request->pengguna_id)->where('inovasi_id', '=', $id_inovasi)->first();

            if($subs->status == "anggota"){
                return "Pengguna sudah manjadi anggota";
            } else {
                $inovasi = Inovasi::where('id_inovasi', '=', $id_inovasi)->first();
                $inovasi->jml_anggota =  $inovasi->jml_anggota + 1;
                $inovasi->save();

                $subs->status = "anggota";
                $subs->save();

                
                DB::commit();
                
                return "Pengguna berhasil bergabung";
            }
            
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat mengirim permintaan";
        }
    }
    
    public function addKemampuanInovasi($id_inovasi, Request $request)
    {

        DB::beginTransaction();
        try {
            $kemampuan = new InovasiKemampuanMapping;
            $kemampuan->kemampuan_id = $request->kemampuan_id;
            $kemampuan->inovasi_id = $id_inovasi;
            $kemampuan->save();
            DB::commit();

            return "Data kemampuan berhasil ditambahkan";
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan saat menambah data kemampuan";
        }
    }
    
    public function inovasiByKemampuan($id_kemampuan, Request $request)
    {

        DB::beginTransaction();
        try {
            $kemampuan = Kemampuan::where('id_kemampuan', '=', $id_kemampuan)->first();

            $list = InovasiKemampuanMapping::join('kemampuan', 'kemampuan.id_kemampuan', '=', 'inovasi_kemampuan_mapping.kemampuan_id')
                                            ->join('inovasi', 'inovasi.id_inovasi', '=', 'inovasi_kemampuan_mapping.inovasi_id')
                                            ->join('kategori', 'inovasi.kategori_id', '=', 'kategori.id_kategori')
                                            ->join('pengguna', 'inovasi.pengguna_id', '=', 'pengguna.id_pengguna')
                                            ->join('wilayah', 'pengguna.lokasi', '=', 'wilayah.id_wilayah')
                                            ->where('inovasi_kemampuan_mapping.kemampuan_id', '=', $id_kemampuan)
                                            ->select('kemampuan.kemampuan', 'kategori.kategori',  'inovasi.judul', 'inovasi.tagline', 
                                            'inovasi.description', 'inovasi.thumbnail', 'inovasi.jml_anggota', 'inovasi.status', 
                                            'inovasi.created_at', 'pengguna.display_name', 'pengguna.profile_picture', 'pengguna.pendidikan', 
                                            'pengguna.email', 'short_desc', 'wilayah.propinsi', 'pengguna.longitude', 'pengguna.latitude')
                                            ->get();

            return $list;
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return "Ada kesalahan pemrosesan data";
        }
    }
    
    public function pendidikan()
    {
        $pendidikan = Pendidikan::all();

        return $pendidikan;
    }

    public function allInovasi()
    {
        $inovasi = Inovasi::join('kategori', 'kategori_id', '=', 'id_kategori')
                            ->join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                            ->select('pengguna.id_pengguna','pengguna.display_name','pengguna.profile_picture','inovasi.*','kategori.*')
                            ->get();

        return $inovasi;
    }
    
    public function allMember($id_inovasi, Request $request)
    {
        $inovasi = Inovasi::find($id_inovasi)->first();

        $member = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')->where('inovasi_id', $id_inovasi)->where('subscription.status','=', 'anggota')->get();

        return $member;
    }
    
    public function requestMember($id_inovasi, Request $request)
    {
        $inovasi = Inovasi::find($id_inovasi)->first();

        $member = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                ->join('pendidikan', 'pengguna.pendidikan', '=', 'pendidikan.id_pendidikan')
                ->join('wilayah', 'pengguna.lokasi', '=', 'wilayah.id_wilayah')
                ->where('inovasi_id', $id_inovasi)
                ->where('subscription.status','=', 'pending')
                ->where('subscription.join_by','=', 'join')
                ->select('subscription.*',  'pengguna.display_name', 'pengguna.profile_picture', 
                'pendidikan.pendidikan','pengguna.email', 'pengguna.short_desc', 'pengguna.longitude', 
                'pengguna.latitude', 'wilayah.propinsi')
                ->get();

        return $member;
    }
    
    public function inviteMember($id_inovasi, Request $request)
    {
        $inovasi = Inovasi::find($id_inovasi)->first();

        $member = Subscription::join('pengguna', 'pengguna_id', '=', 'id_pengguna')
                ->where('inovasi_id', $id_inovasi)
                ->where('subscription.status','=', 'pending')
                ->where('subscription.join_by','=', 'invitation')
                ->get();

        return $member;
    }
    
    public function invitedToInovasi($id_pengguna, Request $request)
    {

        $inovasi = Subscription::join('inovasi', 'inovasi_id', '=', 'id_inovasi')
                ->join('kategori', 'inovasi.kategori_id', '=', 'kategori.id_kategori')
                ->where('subscription.pengguna_id', $id_pengguna)
                ->where('subscription.status','=', 'pending')
                ->where('subscription.join_by','=', 'invitation')
                ->select('subscription.*', 'kategori.*', 'inovasi.judul', 'inovasi.tagline', 'inovasi.description', 'inovasi.thumbnail')
                ->get();

        return $inovasi;
    }
    
    
}
