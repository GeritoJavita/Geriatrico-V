<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PatologiaService;

class PatologiaController extends Controller
{
    protected $patologiaService;

    public function __construct(PatologiaService $patologiaService)
    {
        $this->patologiaService = $patologiaService;
    }

    public function index()
    {
        $patologias = $this->patologiaService->listarPatologias();
        return view('patologia.index', compact('patologias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'fecha_diagnostico' => 'required|date',
            ]);

            $patologia = $this->patologiaService->crearPatologia($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Patología creada correctamente',
                'patologia' => $patologia
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear patología: ' . $e->getMessage()
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

            $patologia = $this->patologiaService->actualizarPatologia($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Patología actualizada correctamente',
                'patologia' => $patologia
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar patología: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->patologiaService->eliminarPatologia($id);

            return response()->json([
                'success' => true,
                'message' => 'Patología eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar patología: ' . $e->getMessage()
            ]);
        }
    }
}
