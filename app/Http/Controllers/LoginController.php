<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

         //Controlador que empleamos solo para hacer pruebas con la autenticacion via SPA de sanctum y las rutas.api
         // tambien probamos que lo podemos consumir desde las rutas de web.php
class LoginController extends Controller
{
    function authenticate(Request $request){

        $validator = validator()->make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if($validator ->fails()){
            // return $validator->errors();
             return response()->json($validator->errors(),422);
        }
        $credentials = $validator->validated();
        if (Auth::attempt($credentials)) {
            $request ->session()->regenerate();
            return response()->json('Autenticacion Completada',200);
            }
        return response()->json('El usuario o la contraseña no son correctos',422);
}
}
