<?php

namespace App\Services;

use App\Repositories\ProductoRepository;
use App\Repositories\InventarioRepository;

class ProductoService
{
    protected $productoRepository;
    protected $inventarioRepository;

    public function __construct(
        ProductoRepository $productoRepository,
        InventarioRepository $inventarioRepository
    ) {
        $this->productoRepository = $productoRepository;
        $this->inventarioRepository = $inventarioRepository;
    }

    public function listarProductos()
    {
        return $this->productoRepository->getAll();
    }

    public function crearProductoConInventario(array $data)
    {
        $producto = $this->productoRepository->create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'categoria_id' => $data['categoria_id'],
            'proveedor_id' => $data['proveedor_id'],
            'fecha_caducidad' => $data['fecha_caducidad'] ?? null,
            'dosis' => $data['dosis'] ?? null,
            'indicaciones' => $data['indicaciones'] ?? null,
            'lote' => $data['lote'] ?? null,
            'presentacion' => $data['presentacion'] ?? null,
        ]);

        $this->inventarioRepository->create([
            'id_producto' => $producto->id,
            'cantidad' => $data['cantidad'],
            'stock' => $data['stock'],
        ]);

        return $producto;
    }

    public function eliminarProducto($id)
    {
        $producto = $this->productoRepository->findById($id);
        if ($producto->inventario) {
            $producto->inventario->delete();
        }
        $producto->delete();
    }
}
