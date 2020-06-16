<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $primaryKey = 'id_subscription';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'inovasi_id',
        'status',
        'join_by',
        'created_at',
        'updated-at'
    ];

    public function pengguna()
    {
        return $this->hasOne('App\Pengguna', 'id_pengguna', 'pengguna_id');
    }
}

