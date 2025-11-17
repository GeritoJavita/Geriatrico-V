<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlergiaService;

class AlergiaController extends Controller
{
    protected $alergiaService;

    public function __construct(AlergiaService $alergiaService)
    {
        $this->alergiaService = $alergiaService;
    }

    public function index()
    {
        $alergias = $this->alergiaService->listarAlergias();
        return view('alergia.index', compact('alergias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'fecha_diagnostico' => 'required|date',
            ]);

            $alergia = $this->alergiaService->crearAlergia($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Alergia creada correctamente',
                'alergia' => $alergia
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear alergia: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'fecha_diagnostico' => 'required|date',
            ]);

            $alergia = $this->alergiaService->actualizarAlergia($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Alergia actualizada correctamente',
                'alergia' => $alergia
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar alergia: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->alergiaService->eliminarAlergia($id);

            return response()->json([
                'success' => true,
                'message' => 'Alergia eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar alergia: ' . $e->getMessage()
            ]);
        }
    }
}