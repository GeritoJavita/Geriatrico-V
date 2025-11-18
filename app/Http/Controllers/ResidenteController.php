<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResidenteService;
use Illuminate\Validation\ValidationException;

class ResidenteController extends Controller
{
    protected $residenteService;

    public function __construct(ResidenteService $residenteService)
    {
        $this->residenteService = $residenteService;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $residentes = $search 
            ? $this->residenteService->buscarResidentes($search)
            : $this->residenteService->listarResidentes();

        // Si es petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'residentes' => $residentes
            ]);
        }

        // Si no es AJAX, devolver vista normal
        return view('residente.index', compact('residentes'));
    }

    public function create()
    {
        return view('residente.create');
    }

    public function show($id)
    {
        try {
            $residente = $this->residenteService->obtenerResidentePorId($id);
            
            if (!$residente) {
                return response()->json([
                    'success' => false,
                    'message' => 'Residente no encontrado'
                ], 404);
            }

            return view('residente.look', compact('residente'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar residente: ' . $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|min:1',
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
                'peso' => 'nullable|numeric',
                'eps' => 'nullable|string|max:100',
            ]);

            // Obtener datos del residente
            $dataResidente = $request->all();
            
            // Obtener alergias y patologías si existen
            $alergias = $request->has('alergias') ? json_decode($request->alergias, true) : [];
            $patologias = $request->has('patologias') ? json_decode($request->patologias, true) : [];

            // Crear residente con alergias y patologías
            $residente = $this->residenteService->crearResidenteConRelaciones($dataResidente, $alergias, $patologias);

            return response()->json([
                'success' => true,
                'message' => 'Residente creado correctamente',
                'residente' => $residente
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $e->errors()
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
