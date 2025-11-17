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
        // limpiar precio
        $data['precio'] = preg_replace('/[^\d]/', '', $data['precio']);

        return $this->productoRepository->create($data);
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
