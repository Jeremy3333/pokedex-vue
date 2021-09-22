<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weaknesses extends Model
{
    use HasFactory;
    protected $table = 'Weaknesses';
    public $timestamps = false;

    protected $casts = [
        "id" => "int",
        "pokedex_id" => "int",
        "bug" => "float",
        "dark" => "float",
        "dragon" => "float",
        "electric" => "float",
        "fairy" => "float",
        "fight" => "float",
        "fire" => "float",
        "flying" => "float",
        "ghost" => "float",
        "grass" => "float",
        "ground" => "float",
        "ice" => "float",
        "normal" => "float",
        "poison" => "float",
        "psychic" => "float",
        "rock" => "float",
        "steel" => "float",
        "water" => "float",
    ];
}
