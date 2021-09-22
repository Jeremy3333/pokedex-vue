<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolutions extends Model
{
    use HasFactory;
    protected $table = 'Evolutions';
    public $timestamps = false;

    protected $casts = [
        'id_pok_base' => 'int',
        'id_pok_evol' => 'int',
        'lvl_evol_pok' => 'int',
        'id' => 'int',
    ];
}
