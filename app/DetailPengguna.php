<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengguna extends Model
{
    protected $table = 'detail_pengguna';

    protected $primaryKey = 'id_detail_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'profile_picture',
        'username',
        'password',
        'pendidikan',
        'pengalaman_kerja',
        'first_name',
        'last_name',
        'email',
        'tgl_lahir',
        'website',
        'no_telp',
        'short_desc',
        'location',
        'rating'
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna', 'pengguna_id', 'id_pengguna');
    }

}