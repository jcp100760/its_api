<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
       // validacion de datos
       $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
       ]);
       // alta del usuario
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->save();

       return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request){
        return response()->json([
            "message" => "Todo ok en metodo login"
        ]);
    }

    public function userProfile(Request $request){
     
    }

    public function logout(){
     
    }

    public function allUsers(){
     
    }
}
