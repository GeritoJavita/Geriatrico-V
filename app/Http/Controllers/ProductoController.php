<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoService;
use App\Models\CategoriaProducto;
use App\Models\Proveedor;

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
        return view('producto.create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categoria_productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $this->productoService->crearProductoConInventario($request->all());

        return redirect()->route('inventario.index')
            ->with('success', '✅ Producto e inventario creados correctamente.');
    }

    public function destroy($id)
    {
        $this->productoService->eliminarProducto($id);

        return redirect()->route('inventario.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
