<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MedicamentoResidenteService;

class MedicamentoResidenteController extends Controller
{
    protected $medicamentoResidenteService;

    public function __construct(MedicamentoResidenteService $medicamentoResidenteService)
    {
        $this->medicamentoResidenteService = $medicamentoResidenteService;
    }

    public function index()
    {
        $medicamentosResidentes = $this->medicamentoResidenteService->listarMedicamentosResidentes();
        return view('medicamento_residente.index', compact('medicamentosResidentes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'dosis' => 'required|string|max:100',
                'frecuencia' => 'required|string|max:100',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'nullable|date',
                'producto_id' => 'nullable|integer|exists:producto,id',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $medicamentoResidente = $this->medicamentoResidenteService->crearMedicamentoResidente($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Medicamento de residente creado correctamente',
                'medicamentoResidente' => $medicamentoResidente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear medicamento de residente: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'dosis' => 'required|string|max:100',
                'frecuencia' => 'required|string|max:100',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'nullable|date',
                'producto_id' => 'nullable|integer|exists:producto,id',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $medicamentoResidente = $this->medicamentoResidenteService->actualizarMedicamentoResidente($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Medicamento de residente actualizado correctamente',
                'medicamentoResidente' => $medicamentoResidente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar medicamento de residente: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->medicamentoResidenteService->eliminarMedicamentoResidente($id);

            return response()->json([
                'success' => true,
                'message' => 'Medicamento de residente eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar medicamento de residente: ' . $e->getMessage()
            ]);
        }
    }
}
