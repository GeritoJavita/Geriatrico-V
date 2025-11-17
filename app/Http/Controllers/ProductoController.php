<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoService;
use App\Models\CategoriaProducto;
use App\Models\Proveedor;
use App\Models\Producto;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = $this->productoService->listarProductos();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = CategoriaProducto::all();
        $proveedores = Proveedor::all();
        return view('producto/producto_create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        try {
            // 1. VALIDACIÓN DE DATOS
            $request->validate([
                'nombre' => 'required|string|max:100',
                'precio' => 'required|string',
                'fecha_caducidad' => 'required|date',
                'dosis' => 'required|string|max:100',
                'indicaciones' => 'nullable|string|max:100',
                'lote' => 'required|string|max:100',
                'presentacion' => 'required|string|max:100',
                'stock' => 'required|integer|min:0',
                'categoria_id' => 'nullable|integer|exists:categoria_producto,id',
                'proveedor_id' => 'nullable|integer|exists:proveedor,id',
            ]);

            // 2. CREAR PRODUCTO desde el service
            $producto = $this->productoService->crearProducto($request->all());

            // 3. RESPUESTA JSON (FUNCIONA PARA TU FRONTEND)
            return response()->json([
                'success' => true,
                'message' => 'Producto creado correctamente',
                'producto' => $producto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear producto: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        $this->productoService->eliminarProducto($id);

        return redirect()->route('inventario.index')
            ->with('success', 'Producto eliminado correctamente.');
    }


    public function actualizar_producto(Request $request)
    {

        try {
            $producto = Producto::findOrFail($request->id);

            // Limpiar el valor de precio (quitar $ y puntos)
            $precio = preg_replace('/[^\d]/', '', $request->precio);

            $producto->update([
                'nombre' => $request->nombre,
                'precio' => $precio,
                'indicaciones' => $request->indicaciones,
                'lote' => $request->lote,
                'presentacion' => $request->presentacion,
                'stock' => $request->stock,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar: ' . $e->getMessage()
            ]);
        }
    }
}
