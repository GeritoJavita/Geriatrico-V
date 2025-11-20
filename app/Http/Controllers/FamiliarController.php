<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FamiliarService;

class FamiliarController extends Controller
{
    protected $familiarService;

    public function __construct(FamiliarService $familiarService)
    {
        $this->familiarService = $familiarService;
    }

    public function index()
    {
        $familiares = $this->familiarService->listarFamiliares();
        return view('familiar.index', compact('familiares'));
    }

         public function create()
    {
        return view('familiar.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|min:1',
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email|max:100',
                'telefono' => 'required|string|max:20',
            ]);

            $familiar = $this->familiarService->crearFamiliar($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Familiar creado correctamente',
                'familiar' => $familiar
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear familiar: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email|max:100',
                'telefono' => 'required|string|max:20',
            ]);

            $familiar = $this->familiarService->actualizarFamiliar($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Familiar actualizado correctamente',
                'familiar' => $familiar
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar familiar: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->familiarService->eliminarFamiliar($id);

            return response()->json([
                'success' => true,
                'message' => 'Familiar eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar familiar: ' . $e->getMessage()
            ]);
        }
    }
}
