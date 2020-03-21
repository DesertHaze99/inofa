<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $table = 'chats';

    protected $primaryKey = 'id_chat';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'inovasi_id',
        'content',
        'created_at',
        'status'
    ];

   public function inovasi()
   {
       return $this->belongsTo('App\Inovasi', 'inovasi_id', 'id_inovasi');
   }

}