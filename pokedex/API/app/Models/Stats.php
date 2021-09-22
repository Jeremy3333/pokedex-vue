<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;
    protected $table = 'Stats';
    public $timestamps = false;

    protected $casts = [
        "id" => "int",
        "pokemon_id" => "int",
        "hp" => "int",
        "attack" => "int",
        "defense" => "int",
        "sp_attack" => "int",
        "sp_defense" => "int",
        "speed" => "int",
    ];
}
