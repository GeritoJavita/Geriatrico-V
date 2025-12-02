<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->listarUsuario();
        return view('usuario.index', compact('usuarios'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'correo' => 'required|email|unique:usuario,email',
                'password' => 'required|string|min:6',
                'direccion' => 'nullable|string|max:255',
            ]);

            $usuario = $this->usuarioService->crearUsuario($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Usuario creado correctamente',
                'usuario' => $usuario
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear usuario: ' . $e->getMessage()
            ]);
        }
    }


    public function create()
    {
        return view('usuario.create');
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:usuario,email,' . $id,
                'password' => 'nullable|string|min:6',
                'telefono' => 'nullable|string|max:20',
                'direccion' => 'nullable|string|max:255',
            ]);

            $usuario = $this->usuarioService->actualizarUsuario($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado correctamente',
                'usuario' => $usuario
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar usuario: ' . $e->getMessage()
            ]);
        }
    }
    public function show($id)
    {
        try {
            $usuario = $this->usuarioService->obtenerUsuarioPorId($id);

            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            return view('usuario.look', compact('usuario'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar usuario: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->usuarioService->eliminarUsuario($id);

            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar usuario: ' . $e->getMessage()
            ]);
        }
    }
}
