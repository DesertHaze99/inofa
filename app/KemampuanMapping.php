<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class KemampuanMapping extends Model
{
    protected $table = 'kemampuan_mapping';

    protected $primaryKey = 'id_mapping';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'kemampuan_id',
        'created_at',
        'updated_at'
    ];

   public function pengguna()
   {
       return $this->belongsTo('App\Pengguna', 'pengguna_id', 'id_pengguna');
   }

}