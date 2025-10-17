<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'clave' => 'required'
        ]);

        $usuario = User::where('correo', $request->correo)->first();

        if ($usuario && Hash::check($request->clave, $usuario->clave)) {
            Auth::login($usuario); // Inicia sesión
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['correo' => 'Credenciales inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
