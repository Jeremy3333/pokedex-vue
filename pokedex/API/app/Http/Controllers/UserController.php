<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $request) {
        // Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
    
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return "camarcje";
            } else {
                return "tamere";
            }
        // });
    }
    function getUsers() {
        $users = User::all();
        $use = [];
        foreach($users as $user) {
            array_push($use,[
                "user_id" => json_decode($user, true)["id"],
                "username" => json_decode($user, true)["name"],
                "profil-icon_id " => json_decode($user, true)["profil_icon_id"],
            ]);
        };
        $use = ["users" => $use];
        return response($use, 200);
    }
    function getUser(Request $request, $id) {
        $users = User::all();
        $test = false;
        foreach($users as $user) {
            if ( $id == json_decode($user, true)["id"]){
                $test = true;
                $use = [
                    "user" => [
                        "user_id" => json_decode($user, true)["id"],
                        "username" => json_decode($user, true)["name"],
                        "profil-icon_id " => json_decode($user, true)["profil_icon_id"],
                    ]
                ];
            }
        }
        if ($test){
            return response($use, 200);
        } else {
            $error = ["error" => ["message" => "Ressource  not  found"]];
            return response($error, 404);
        }
    }
}
