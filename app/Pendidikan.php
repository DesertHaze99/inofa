<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';

    protected $primaryKey = 'id_pendidikan';

    public $timestamps = false;

    protected $fillable = [
        'pendidikan'
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna', 'id_pendidikan', 'pendidikan');
    }

}