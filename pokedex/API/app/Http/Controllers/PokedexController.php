<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokedex;
use App\Models\Types;
use App\Models\Stats;
use App\Models\Weaknesses;
use App\Models\Evolutions;

class PokedexController extends Controller
{
    function getpokedex(){
        $pokemons = Pokedex::all();
        $types = Types::all();
        $pok = [];
        $num = 0;
        foreach($pokemons as $pokemon) {
            array_push($pok,[ 
                "id" => json_decode($pokemon, true)["id_pok"],
                "name" => json_decode($pokemon, true)["nom_pok"],
                "types" => [
                    "type1" => json_decode($types, true)[$num]["type1"],
                    "type2" => json_decode($types, true)[$num]["type2"]
                ],
                "image" => strval(json_decode($pokemon, true)["id_pok"]) . ".png"
            ]);
            $test = json_decode($types, true)[$num]["type1"];
            $num++;
        };
        $poke = ["pokemons" => $pok];
        return response($poke, 200);
    }
    function getpoke(Request $request, $id){
        if (intval($id) < 152 && intval($id) > 0 && preg_match('~[0-9]+~', $id) == 1) {
            $pokemons = Pokedex::all();
            $types = Types::all();
            $stats = Stats::all();
            $weaknesses = Weaknesses::all();
            $evolutions = Evolutions::all();
            $pok = [];
            $ev = [];
            $num = 0;
            foreach($evolutions as $evolution){
                if ( $id == json_decode($evolution, true)["id_pok_base"])[
                    array_push($ev, ["evolution" => [
                        "base_id" => json_decode($evolution, true)["id_pok_base"],
                        "evolution_id" => json_decode($evolution, true)["id_pok_evol"],
                        "required_lvl" => json_decode($evolution, true)["lvl_evol_pok"],
                    ]])
                ];
            }
            foreach($pokemons as $pokemon) {
                if ( $id == json_decode($pokemon, true)["id_pok"]){
                    $pok = ["note"=> [ 
                        "id" => json_decode($pokemon, true)["id_pok"],
                        "name" => json_decode($pokemon, true)["nom_pok"],
                        "types" => [
                            "type1" => json_decode($types, true)[$num]["type1"],
                            "type2" => json_decode($types, true)[$num]["type2"]
                        ],
                        "image" => strval(json_decode($pokemon, true)["id_pok"]) . ".png",
                        "description" => json_decode($pokemon, true)["description"],
                        "stats" => [
                            "hp" =>  json_decode($stats, true)[$num]["hp"],
                            "attack" =>  json_decode($stats, true)[$num]["attack"],
                            "defense" =>  json_decode($stats, true)[$num]["defense"],
                            "special_attack" =>  json_decode($stats, true)[$num]["sp_attack"],
                            "special_defense" =>  json_decode($stats, true)[$num]["sp_defense"],
                            "speed" =>  json_decode($stats, true)[$num]["speed"],
                        ],
                        "weaknesses" => [
                            "bug" => json_decode($weaknesses, true)[$num]["bug"],
                            "dark" => json_decode($weaknesses, true)[$num]["dark"],
                            "dragon" => json_decode($weaknesses, true)[$num]["dragon"],
                            "electric" => json_decode($weaknesses, true)[$num]["electric"],
                            "fairy" => json_decode($weaknesses, true)[$num]["fairy"],
                            "fight" => json_decode($weaknesses, true)[$num]["fight"],
                            "fire" => json_decode($weaknesses, true)[$num]["fire"],
                            "flying" => json_decode($weaknesses, true)[$num]["flying"],
                            "ghost" => json_decode($weaknesses, true)[$num]["ghost"],
                            "grass" => json_decode($weaknesses, true)[$num]["grass"],
                            "ground" => json_decode($weaknesses, true)[$num]["ground"],
                            "ice" => json_decode($weaknesses, true)[$num]["ice"],
                            "normal" => json_decode($weaknesses, true)[$num]["normal"],
                            "poison" => json_decode($weaknesses, true)[$num]["poison"],
                            "psychic" => json_decode($weaknesses, true)[$num]["psychic"],
                            "rock" => json_decode($weaknesses, true)[$num]["rock"],
                            "steel" => json_decode($weaknesses, true)[$num]["steel"],
                            "water" => json_decode($weaknesses, true)[$num]["water"],
                        ],
                        "evolutions" => $ev
                    ]];
                }
                $num++;
            }
            return response($pok, 200);
        } elseif(preg_match('~[0-9]+~', $id) == 0) {
            $error = ["error" => ["message" => "Invalid  query"]];
            return response($error, 400);
        } else {
            $error = ["error" => ["message" => "Ressource  not  found"]];
            return response($error, 404);
        }
    }
}
