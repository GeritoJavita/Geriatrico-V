<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SignosVitalesService;

class SignosVitalesController extends Controller
{
    protected $signosVitalesService;

    public function __construct(SignosVitalesService $signosVitalesService)
    {
        $this->signosVitalesService = $signosVitalesService;
    }

    public function index()
    {
        $signosVitales = $this->signosVitalesService->listarSignosVitales();
        return view('signos_vitales.index', compact('signosVitales'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'hora' => 'required',
                'presion_sistolica' => 'required|numeric',
                'presion_diastolica' => 'required|numeric',
                'temperatura' => 'required|numeric',
                'frecuencia_resp' => 'required|integer',
                'frecuencia_card' => 'required|integer',
                'reporte_signos' => 'nullable|string',
                'residente_id' => 'required|integer|exists:residente,id',
                'empleado_id' => 'required|integer|exists:empleado,id',

            ]);

            $signosVitales = $this->signosVitalesService->crearSignosVitales($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Signos vitales creados correctamente',
                'signosVitales' => $signosVitales
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear signos vitales: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'hora' => 'required',
                'presion_sistolica' => 'required|numeric',
                'presion_diastolica' => 'required|numeric',
                'temperatura' => 'required|numeric',
                'frecuencia_resp' => 'required|integer',
                'frecuencia_card' => 'required|integer',
                'reporte_signos' => 'nullable|string',
                'residente_id' => 'required|integer|exists:residente,id',
                'empleado_id' => 'required|integer|exists:empleado,id',
            ]);

            $signosVitales = $this->signosVitalesService->actualizarSignosVitales($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Signos vitales actualizados correctamente',
                'signosVitales' => $signosVitales
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar signos vitales: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->signosVitalesService->eliminarSignosVitales($id);

            return response()->json([
                'success' => true,
                'message' => 'Signos vitales eliminados correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar signos vitales: ' . $e->getMessage()
            ]);
        }
    }
    // En SignosVitalesController
    public function ultimosSignosPorResidente($residenteId)
    {
        $ultimoSigno = $this->signosVitalesService
            ->listarSignosPorResidente($residenteId)
            ->orderByDesc('fecha')
            ->orderByDesc('hora')
            ->first();

        return response()->json($ultimoSigno);
    }
}
