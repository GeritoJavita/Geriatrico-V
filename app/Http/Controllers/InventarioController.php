<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index(Request $request)
{
    // Filtrar productos
    $queryProductos = Producto::query();
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $queryProductos->where('nombre', 'like', "%$search%")
                       ->orWhere('id', $search)
                       ->orWhere('proveedor_id', $search);
    }
    $productos = $queryProductos->get();

    // Filtrar inventarios
    $queryInventario = Inventario::with('producto');
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $queryInventario->whereHas('producto', function($q) use ($search) {
            $q->where('nombre', 'like', "%$search%")
              ->orWhere('id', $search);
        })->orWhere('stock', $search)
          ->orWhere('cantidad', $search);
    }
    $inventarios = $queryInventario->get();

    return view('inventario', compact('productos', 'inventarios'));
}

}
