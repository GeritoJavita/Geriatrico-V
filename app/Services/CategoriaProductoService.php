<?php

namespace App\Services;

use App\Repositories\CategoriaProductoRepository;

class CategoriaProductoService
{
    protected $categoriaProductoRepository;

    public function __construct(CategoriaProductoRepository $categoriaProductoRepository)
    {
        $this->categoriaProductoRepository = $categoriaProductoRepository;
    }

    public function listarCategoriasProductos()
    {
        return $this->categoriaProductoRepository->getAll();
    }

    public function crearCategoriaProducto(array $data)
    {
        return $this->categoriaProductoRepository->create($data);
    }

    public function actualizarCategoriaProducto($id, array $data)
    {
        return $this->categoriaProductoRepository->update($id, $data);
    }

    public function eliminarCategoriaProducto($id)
    {
        return $this->categoriaProductoRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->categoriaProductoRepository->search($search)
            : $this->categoriaProductoRepository->getAll();
    }
}
