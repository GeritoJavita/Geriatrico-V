<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'correo' => 'required|email',
            'password' => 'required',
        ]);

     
       if (Auth::guard('web')->attempt(['correo' => $credentials['correo'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $usuario = Auth::user();


            $redirect = match ($usuario->rol_id) {
                1 => '/dashboard_admin',
                2 => '/dashboard_empleado',
                3 => '/dashboard_admin',
                default => '/dashboard'
            };

            return response()->json([
                'success' => true,
                'redirect' => $redirect,
                'rol' => $usuario->rol_id,
            ]);
        }

        Log::warning('❌ Intento de inicio de sesión fallido', [
            'correo' => $request->input('correo'),
            'ip' => $request->ip(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Credenciales incorrectas'
        ]);
    }

   
    public function logins()
    {
        return view('login.login');
    }

  
    public function User_register()
    {
        return view('login.User_register');
    }
}
