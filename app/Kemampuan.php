<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kemampuan extends Model
{
    protected $table = 'kemampuan';

    protected $primaryKey = 'id_kemampuan';

    public $timestamps = false;

    protected $fillable = [
        'kemampuan',
        'kemampuan_thumbnail'
    ];

}

