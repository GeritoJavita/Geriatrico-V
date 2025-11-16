<?php 

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Models\Usuario;

class Register_userController
{
    public function send_register(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|numeric|unique:usuario,id', 
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email|unique:usuario,correo',
                'password' => 'required|min:8', 
                'telefono' => 'nullable|string|min:7|max:15',
                'direccion' => 'nullable|string|max:255',
            ]);

            $usuario = Usuario::create([
                'id' => $validated['id'],
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'correo' => $validated['correo'],
                'direccion' => $validated['direccion'] ?? '',
                'clave' => bcrypt($validated['password'])
            ]);
            $usuario->assignRole('user');
            
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
