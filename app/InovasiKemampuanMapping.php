<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class InovasiKemampuanMapping extends Model
{
    protected $table = 'inovasi_kemampuan_mapping';

    protected $primaryKey = 'id_mapping';

    public $timestamps = false;

    protected $fillable = [
        'inovasi_id',
        'kemampuan_id',
        'created_at',
        'updated_at'
    ];

    public function inovasi()
    {
        return $this->hasOne('App\Inovasi', 'inovasi_id', 'id_inovasi');
    }

    public function kemampuan()
    {
        return $this->hasMany('App\Kemampuan', 'kemampuan_id', 'id_kemampuan');
    }

}

