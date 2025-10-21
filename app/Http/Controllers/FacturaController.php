<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacturaService;
use App\Models\Producto;

class FacturaController extends Controller
{
    protected $facturaService;

    public function __construct(FacturaService $facturaService)
    {
        $this->facturaService = $facturaService;
    }

    public function create()
    {
        $productos = Producto::all();
        return view('factura.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'tipo' => 'required|string|max:50',
            'id_producto' => 'required|exists:producto,id',
            'archivo_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $this->facturaService->crearFactura($request->all());

        return redirect()->route('inventario.index')
                         ->with('success', '✅ Factura registrada correctamente.');
    }

    public function index()
    {
        $facturas = $this->facturaService->listarFacturas();
        return view('factura.index', compact('facturas'));
    }

    public function destroy($id)
    {
        $this->facturaService->eliminarFactura($id);
        return back()->with('success', 'Factura eliminada correctamente.');
    }
}
