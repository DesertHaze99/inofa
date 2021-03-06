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
        'media',
        'created_at',
        'status'
    ];

   public function inovasi()
   {
       return $this->belongsTo('App\Inovasi', 'inovasi_id', 'id_inovasi');
   }
   public function ChatMapping()
   {
       return $this->hasMany('App\ChatMapping', 'chat_id', 'id_chat');
   }

}

