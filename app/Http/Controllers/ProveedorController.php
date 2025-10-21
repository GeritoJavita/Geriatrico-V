<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProveedorService;

class ProveedorController extends Controller
{
    protected $proveedorService;

    public function __construct(ProveedorService $proveedorService)
    {
        $this->proveedorService = $proveedorService;
    }

    public function index()
    {
        $proveedores = $this->proveedorService->listarProveedores();
        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email|max:255',
        ]);

        $this->proveedorService->crearProveedor($request->only(['nombre','direccion','telefono','correo']));
        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function edit($id)
    {
        $proveedor = $this->proveedorService->obtenerProveedor($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email|max:255',
        ]);

        $this->proveedorService->actualizarProveedor($id, $request->only(['nombre','direccion','telefono','correo']));
        return redirect()->route('proveedor.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $this->proveedorService->eliminarProveedor($id);
        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
