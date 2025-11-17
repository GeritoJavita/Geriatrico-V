<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuejaNovedadService;

class QuejaNovedadController extends Controller
{
    protected $quejaNovedadService;

    public function __construct(QuejaNovedadService $quejaNovedadService)
    {
        $this->quejaNovedadService = $quejaNovedadService;
    }

    public function index()
    {
        $quejas = $this->quejaNovedadService->listarQuejasNovedades();
        return view('queja_novedad.index', compact('quejas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tipo' => 'required|string|max:50',
                'descripcion' => 'required|string',
                'fecha' => 'required|date',
                'familiar_id' => 'required|integer|exists:familiar,id',
            ]);

            $quejaNovedad = $this->quejaNovedadService->crearQuejaNovedad($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Queja/Novedad creada correctamente',
                'quejaNovedad' => $quejaNovedad
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear queja/novedad: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'tipo' => 'required|string|max:50',
                'descripcion' => 'required|string',
                'fecha' => 'required|date',
                'familiar_id' => 'required|integer|exists:familiar,id',
            ]);

            $quejaNovedad = $this->quejaNovedadService->actualizarQuejaNovedad($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Queja/Novedad actualizada correctamente',
                'quejaNovedad' => $quejaNovedad
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar queja/novedad: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->quejaNovedadService->eliminarQuejaNovedad($id);

            return response()->json([
                'success' => true,
                'message' => 'Queja/Novedad eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar queja/novedad: ' . $e->getMessage()
            ]);
        }
    }
}
