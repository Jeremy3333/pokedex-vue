<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokedexController;

Route::get('pokemons',[PokedexController::class,'getpokedex']);
Route::get('pokemons/{id}',[PokedexController::class,'getpoke']);

Route::get('users',[UserController::class,'getUsers']);
Route::get('users/me', function(){
    return response(Auth::user()->name, 200);
});
Route::get('users/{id}',[UserController::class,'getUser']);
Route::post('login',[UserController::class,'login']);