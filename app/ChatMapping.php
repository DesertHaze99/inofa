<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ChatMapping extends Model
{
    protected $table = 'chat_mapping';

    protected $primaryKey = 'id_mapping';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'chat_id',
        'created_at',
        'updated_at'
    ];

   public function inovasi()
   {
       return $this->belongsTo('App\Chats', 'chat_id', 'id_chat');
   }

}