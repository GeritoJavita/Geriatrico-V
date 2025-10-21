<?php

namespace App\Services;

use App\Repositories\ProductoRepository;
use App\Repositories\InventarioRepository;

class InventarioService
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

    public function listar($search = null)
    {
        $productos = $search
            ? $this->productoRepository->search($search)
            : $this->productoRepository->getAll();

        $inventarios = $search
            ? $this->inventarioRepository->search($search)
            : $this->inventarioRepository->getAll();

        return compact('productos', 'inventarios');
    }
}
