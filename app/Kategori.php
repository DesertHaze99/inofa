<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    public $timestamps = false;

    protected $fillable = [
        'kategori',
        'kategori_thumbnail',
        'warna',
        'jumlah'
    ];

   public function inovasi()
   {
       return $this->belongsTo('App\Inovasi', 'id_kategori', 'kategori_id');
   }
}

