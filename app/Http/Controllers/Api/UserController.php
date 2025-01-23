<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        public function generateQrCode()
        {
            // Generar un código QR en formato SVG
            $qrCode = QrCode::size(200)->generate('https://github.com/juancosta001');

            // Devolver el código QR como una respuesta JSON
            return response()->json([
                'qrCode' => $qrCode,
            ]);
        }

}
