<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
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
        'rating',
        'status'
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