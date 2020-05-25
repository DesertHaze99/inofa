<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    protected $primaryKey = 'id_wilayah';

    public $timestamps = false;

    protected $fillable = [
        'propinsi',
        'longitude',
        'latitude',
        'kabupaten',
        'jumlah'
    ];

   public function inovasi()
   {
       return $this->belongsTo('App\Inovasi', 'id_kategori', 'kategori_id');
   }
}