<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'clave');

        if (Auth::attempt($credentials)) {

            return response()->json(['message' => 'Inicio de sesión exitoso']);
        }


        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}
