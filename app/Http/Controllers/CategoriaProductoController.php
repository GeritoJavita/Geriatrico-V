<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoriaProductoService;

class CategoriaProductoController extends Controller
{
    protected $categoriaProductoService;

    public function __construct(CategoriaProductoService $categoriaProductoService)
    {
        $this->categoriaProductoService = $categoriaProductoService;
    }

    public function index()
    {
        $categoriasProductos = $this->categoriaProductoService->listarCategoriasProductos();
        return view('categoria_producto.index', compact('categoriasProductos'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
            ]);

            $categoriaProducto = $this->categoriaProductoService->crearCategoriaProducto($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Categoría de producto creada correctamente',
                'categoriaProducto' => $categoriaProducto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear categoría de producto: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
            ]);

            $categoriaProducto = $this->categoriaProductoService->actualizarCategoriaProducto($id, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Categoría de producto actualizada correctamente',
                'categoriaProducto' => $categoriaProducto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar categoría de producto: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoriaProductoService->eliminarCategoriaProducto($id);

            return response()->json([
                'success' => true,
                'message' => 'Categoría de producto eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar categoría de producto: ' . $e->getMessage()
            ]);
        }
    }
}
