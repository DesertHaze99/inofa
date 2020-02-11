<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'added_by',
        'created_at',
        'updated_at'
    ];

    public function detailPengguna()
    {
        return $this->hasOne('App\DetailPengguna', 'pengguna_id', 'id_pengguna');
    }

    public function inovasi()
    {
        return $this->hasMany('App\Inovasi', 'pengguna_id', 'id+pengguna');
    }

    public function subscription()
    {
        return $this->hasMany('App\Subscription', 'id_pengguna', 'pengguna_id');
    }

}
