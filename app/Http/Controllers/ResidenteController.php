<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResidenteService;

class ResidenteController extends Controller
{
    protected $residenteService;

    public function __construct(ResidenteService $residenteService)
    {
        $this->residenteService = $residenteService;
    }

    public function index()
    {
        $residentes = $this->residenteService->listarResidentes();
        return view('residente.index', compact('residentes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|string|max:20',
                'fecha_ingreso' => 'required|date',
                'tipo_sangre' => 'required|string|max:10',
                'genero' => 'required|string|max:20',
                'telefono_emerg' => 'nullable|string|max:20',
                'habitacion' => 'nullable|string|max:50',
                'cama' => 'nullable|string|max:50',
                'condicion_medica' => 'nullable|string',
                'direccion' => 'nullable|string|max:255',
                'altura' => 'nullable|numeric',
                'eps' => 'nullable|string|max:100',
            ]);

            $residente = $this->residenteService->crearResidente($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Residente creado correctamente',
                'residente' => $residente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear residente: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|string|max:20',
                'fecha_ingreso' => 'required|date',
                'tipo_sangre' => 'required|string|max:10',
                'genero' => 'required|string|max:20',
                'telefono_emerg' => 'nullable|string|max:20',
                'habitacion' => 'nullable|string|max:50',
                'cama' => 'nullable|string|max:50',
                'condicion_medica' => 'nullable|string',
                'direccion' => 'nullable|string|max:255',
                'altura' => 'nullable|numeric',
                'eps' => 'nullable|string|max:100',
            ]);

            $residente = $this->residenteService->actualizarResidente($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Residente actualizado correctamente',
                'residente' => $residente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar residente: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->residenteService->eliminarResidente($id);

            return response()->json([
                'success' => true,
                'message' => 'Residente eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar residente: ' . $e->getMessage()
            ]);
        }
    }
}
