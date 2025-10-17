<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Proveedor;
use App\Models\Inventario;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedor'])->get();
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

    // 1 Crear el producto
    $producto = Producto::create([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
        'categoria_id' => $request->categoria_id,
        'proveedor_id' => $request->proveedor_id,
        'fecha_caducidad' => $request->fecha_caducidad,
        'dosis' => $request->dosis,
        'indicaciones' => $request->indicaciones,
        'lote' => $request->lote,
        'presentacion' => $request->presentacion,
    ]);

    // Crear inventario asociado al producto
    Inventario::create([
        'id_producto' => $producto->id,
        'cantidad' => $request->cantidad,
        'stock' => $request->stock,
    ]);

    return redirect()
        ->route('inventario.index')
        ->with('success', '✅ Producto e inventario creados correctamente.');
}

public function destroy($id)
{
    $producto = Producto::findOrFail($id);

    //  eliminar también su inventario asociado:
    if ($producto->inventario) {
        $producto->inventario->delete();
    }

    $producto->delete();

    return redirect()->route('inventario.index')
        ->with('success', 'Producto eliminado correctamente');
}
}
