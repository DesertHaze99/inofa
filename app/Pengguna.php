<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'profile_picture',
        'display_name',
        'password',
        'pendidikan',
        'pengalaman_kerja',
        'email',
        'tgl_lahir',
        'website',
        'no_telp',
        'short_desc',
        'longitude',
        'latitude',
        'lokasi',
        'token',
        'rating',
        'status'
    ];
    
    protected $hidden = [
         'remember_token'
    ];

    public function pendidikan()
    {
        return $this->hasOne('App\Pendidikan', 'id_pendidikan', 'pendidikan');
    }

    public function inovasi()
    {
        return $this->hasMany('App\Inovasi', 'pengguna_id', 'id_pengguna');
    }

    public function subscription()
    {
        return $this->hasMany('App\Subscription', 'pengguna_id', 'id_pengguna');
    }

}