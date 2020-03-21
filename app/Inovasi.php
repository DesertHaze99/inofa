<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Inovasi extends Model
{
    protected $table = 'inovasi';

    protected $primaryKey = 'id_inovasi';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'judul',
        'tagline',
        'kategori_id',
        'description',
        'thumbnail',
        'created_at',
        'updated-at'
    ];

    public function pengguna()
    {
        return $this->hasOne('App\Pengguna', 'id_pengguna', 'pengguna_id');
    }

    public function kategori()
    {
        return $this->hasOne('App\Kategori', 'id_kategori', 'kategori_id');
    }

    public function chats()
    {
        return $this->hasMany('App\Chats', 'inovasi_id', 'id_inovasi');
    }

}