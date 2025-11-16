<?php

namespace App\Services;

use App\Repositories\ProductoRepository;

class InventarioService
{
    protected $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function listar($search = null)
    {
        $productos = $search
            ? $this->productoRepository->search($search)
            : $this->productoRepository->getAll();

        return compact('productos');
    }
}
