<?php

namespace App\Services;

use App\Repositories\ProductoRepository;

class ProductoService
{
    protected $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function listarProductos()
    {
        return $this->productoRepository->getAll();
    }

    public function crearProducto(array $data)
    {
        return $this->productoRepository->create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'categoria_id' => $data['categoria_id'],
            'proveedor_id' => $data['proveedor_id'],
            'fecha_caducidad' => $data['fecha_caducidad'] ?? null,
            'dosis' => $data['dosis'] ?? null,
            'indicaciones' => $data['indicaciones'] ?? null,
            'lote' => $data['lote'] ?? null,
            'presentacion' => $data['presentacion'] ?? null,
            'stock' => $data['stock'] ?? null,
        ]);
    }

    public function eliminarProducto($id)
    {
        $producto = $this->productoRepository->findById($id);
        $producto->delete();
    }

    public function listar($search = null)
    {
        $productos = $search
            ? $this->productoRepository->search($search)
            : $this->productoRepository->getAll();

        $inventarios = $search
            ? $this->productoRepository->search($search)
            : $this->productoRepository->getAll();

        return compact('productos', 'inventarios');
    }
}
