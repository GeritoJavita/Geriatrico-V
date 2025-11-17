<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpleadoService;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    public function index()
    {
        $empleados = $this->empleadoService->listarEmpleados();
        return view('empleado.index', compact('empleados'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fecha_ingreso' => 'required|date',
                'salario' => 'required|numeric',
                'fecha_salida' => 'nullable|date',
                'usuario_id' => 'required|integer|exists:usuario,id',
            ]);

            $empleado = $this->empleadoService->crearEmpleado($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Empleado creado correctamente',
                'empleado' => $empleado
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear empleado: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fecha_ingreso' => 'required|date',
                'salario' => 'required|numeric',
                'fecha_salida' => 'nullable|date',
                'usuario_id' => 'required|integer|exists:usuario,id',
            ]);

            $empleado = $this->empleadoService->actualizarEmpleado($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Empleado actualizado correctamente',
                'empleado' => $empleado
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar empleado: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->empleadoService->eliminarEmpleado($id);

            return response()->json([
                'success' => true,
                'message' => 'Empleado eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar empleado: ' . $e->getMessage()
            ]);
        }
    }
}
