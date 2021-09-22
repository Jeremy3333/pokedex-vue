<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;
    protected $table = 'Pokedex';
    public $timestamps = false;

    protected $casts = [
        'id_pok' => 'int'
    ];

    protected $fillable = [
        'nom_pok',
        'description'
    ];
}
