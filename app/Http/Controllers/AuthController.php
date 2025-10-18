<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Usuarios;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function logins()
    {
        return view('logins');
    }

    public function User_register()
    {
        return view('User_register');
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

    public function send_register(Request $request)
    {
        try {
            // Validación
            $validated = $request->validate([
                'id' => 'required|numeric|unique:usuarios,id',
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email|unique:usuarios,correo',
                'contraseña' => 'required|min:8',
                'telefono' => 'nullable|string|min:7|max:15',
                'direccion' => 'nullable|string|max:255',
            ]);

            // Crear usuario
            Usuarios::create([
                'id' => $validated['id'],
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'correo' => $validated['correo'],
                'direccion' => $validated['direccion'] ?? '',
                'clave' => bcrypt($validated['contraseña']),
                'rol_id' => 3
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado correctamente'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar usuario: ' . $e->getMessage()
            ], 500);
        }
    }
}
