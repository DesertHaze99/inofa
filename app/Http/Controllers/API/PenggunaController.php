<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;
use URL;
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

class PenggunaController extends Controller
{

    public $successStatus = 200;

    public function login($email){
        $user = Pengguna::where('email', $email)->first();

        if(!empty($user)){
            $successLogin['token'] =  $user->createToken('nApp')->accessToken;
            $successLogin['name'] =  $user->display_name;

            $user->token =  $successLogin['token'];
            $user->save();

            return response()->json(['successLogin'=>$successLogin, 'user'=> $user], $this->successStatus);
        } else {
            $res['message'] = "Pengguna belum terdaftar";

            return response($res);
        }
       /*  if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        } */
    }

    public function register(request $newSignuUp )
    {
        
            $dataPengguna = Pengguna::where('email', '=', $newSignuUp->email)->get();
            if(count($dataPengguna) >= 1){
                return "User sudah terdaftar";
            } else {
                $response = array();
                $display_name = $newSignuUp->display_name;
                $id = $newSignuUp->id;
                $email = $newSignuUp->email;
                $profile_picture = $newSignuUp->profile_picture;

                $newUser = new Pengguna;
                $newUser->display_name = $display_name;
                $newUser->profile_picture = $profile_picture;
                $newUser->id = $id;
                $newUser->email = $email;
                
                if ($newUser->save()) {
                    $res['message'] = "Pengguna berhasil didaftarkan";
                    $res['value'] = "$newUser";

                    $success['token'] =  $newUser->createToken('nApp')->accessToken;
                    $success['name'] =  $newUser->display_name;

                    $newUser->token =  $success['token'];
                    $newUser->save();

                    return response()->json(['success'=>$success, 'res'=> $res], $this->successStatus);
                }
                else{
                    $res['message'] = "Data yang dimasukkan tidak sesuai permintaan";
                    return response($res);
                }
                
            }

           
        
        
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}