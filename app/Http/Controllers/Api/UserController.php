<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\User;


//controlador utilizado para hacer las pruebas via token
class UserController extends Controller
{
    function login(Request $request){

        $validator = validator()->make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if($validator ->fails()){
            // return $validator->errors();
             return response()->json($validator->errors(),422);
        }
        $credentials = $validator->validated();
        //cuando se trabaja via tokens se trabaja especialmente por esta partes
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('myapptoken')->plainTextToken;

            session()->put('token', $token);

            return response()->json([
                'isLoggedIn' => true,
                'token' => $token,
                'user' => Auth::user(),
            ], 200);
        }

            return response()->json( 'El usuario o la contraseña no son correctos',422);
    }
        public function logout(Request $request)
        {
            if ($request->user()) {
                $request->user()->tokens()->delete();
            }

            session()->flush(); // Limpia la sesión
            return response()->json(['message' => 'Sesión cerrada exitosamente'], 200);
        }

}
