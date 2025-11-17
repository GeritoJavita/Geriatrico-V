<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResumenAtencionService;

class ResumenAtencionController extends Controller
{
    protected $resumenAtencionService;

    public function __construct(ResumenAtencionService $resumenAtencionService)
    {
        $this->resumenAtencionService = $resumenAtencionService;
    }

    public function index()
    {
        $resumenesAtencion = $this->resumenAtencionService->listarResumenesAtencion();
        return view('resumen_atencion.index', compact('resumenesAtencion'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'actividades' => 'nullable|string',
                'notas_enferme' => 'nullable|string',
                'estado_general' => 'required|string',
                'empleado_id' => 'required|integer|exists:empleado,id',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $resumenAtencion = $this->resumenAtencionService->crearResumenAtencion($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Resumen de atención creado correctamente',
                'resumenAtencion' => $resumenAtencion
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear resumen de atención: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fecha' => 'required|date',
                'actividades' => 'nullable|string',
                'notas_enferme' => 'nullable|string',
                'estado_general' => 'required|string',
                'empleado_id' => 'required|integer|exists:empleado,id',
                'residente_id' => 'required|integer|exists:residente,id',
            ]);

            $resumenAtencion = $this->resumenAtencionService->actualizarResumenAtencion($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Resumen de atención actualizado correctamente',
                'resumenAtencion' => $resumenAtencion
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar resumen de atención: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->resumenAtencionService->eliminarResumenAtencion($id);

            return response()->json([
                'success' => true,
                'message' => 'Resumen de atención eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar resumen de atención: ' . $e->getMessage()
            ]);
        }
    }
}
