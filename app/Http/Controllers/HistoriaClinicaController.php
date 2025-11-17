<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HistoriaClinicaService;

class HistoriaClinicaController extends Controller
{
    protected $historiaClinicaService;

    public function __construct(HistoriaClinicaService $historiaClinicaService)
    {
        $this->historiaClinicaService = $historiaClinicaService;
    }

    public function index()
    {
        $historiasClinicas = $this->historiaClinicaService->listarHistoriasClinicas();
        return view('historia_clinica.index', compact('historiasClinicas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'antecedentes' => 'nullable|string',
                'diagnostico' => 'required|string',
                'tratamientos' => 'nullable|string',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $historiaClinica = $this->historiaClinicaService->crearHistoriaClinica($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Historia clínica creada correctamente',
                'historiaClinica' => $historiaClinica
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear historia clínica: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'antecedentes' => 'nullable|string',
                'diagnostico' => 'required|string',
                'tratamientos' => 'nullable|string',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $historiaClinica = $this->historiaClinicaService->actualizarHistoriaClinica($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Historia clínica actualizada correctamente',
                'historiaClinica' => $historiaClinica
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar historia clínica: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->historiaClinicaService->eliminarHistoriaClinica($id);

            return response()->json([
                'success' => true,
                'message' => 'Historia clínica eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar historia clínica: ' . $e->getMessage()
            ]);
        }
    }
}
