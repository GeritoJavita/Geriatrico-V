<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DetalleProductoService;

class DetalleProductoController extends Controller
{
    protected $detalleProductoService;

    public function __construct(DetalleProductoService $detalleProductoService)
    {
        $this->detalleProductoService = $detalleProductoService;
    }

    public function index()
    {
        $detallesProductos = $this->detalleProductoService->listarDetallesProductos();
        return view('detalle_producto.index', compact('detallesProductos'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_factura' => 'required|integer|exists:factura,id',
                'id_producto' => 'required|integer|exists:producto,id',
                'subtotal' => 'required|numeric',
            ]);

            $detalleProducto = $this->detalleProductoService->crearDetalleProducto($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Detalle de producto creado correctamente',
                'detalleProducto' => $detalleProducto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear detalle de producto: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_factura' => 'required|integer|exists:factura,id',
                'id_producto' => 'required|integer|exists:producto,id',
                'subtotal' => 'required|numeric',
            ]);

            $detalleProducto = $this->detalleProductoService->actualizarDetalleProducto($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Detalle de producto actualizado correctamente',
                'detalleProducto' => $detalleProducto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar detalle de producto: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->detalleProductoService->eliminarDetalleProducto($id);

            return response()->json([
                'success' => true,
                'message' => 'Detalle de producto eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar detalle de producto: ' . $e->getMessage()
            ]);
        }
    }
}
