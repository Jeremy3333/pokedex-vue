<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $table = 'Types';
    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'id_pok' => 'int'
    ];

    protected $fillable = [
        'type1',
        'type2'
    ];
}
