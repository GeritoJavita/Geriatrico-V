<?php

namespace App\Services;

use App\Repositories\DetalleProductoRepository;

class DetalleProductoService
{
    protected $detalleProductoRepository;

    public function __construct(DetalleProductoRepository $detalleProductoRepository)
    {
        $this->detalleProductoRepository = $detalleProductoRepository;
    }

    public function listarDetallesProductos()
    {
        return $this->detalleProductoRepository->getAll();
    }

    public function crearDetalleProducto(array $data)
    {
        return $this->detalleProductoRepository->create($data);
    }

    public function actualizarDetalleProducto($id, array $data)
    {
        return $this->detalleProductoRepository->update($id, $data);
    }

    public function eliminarDetalleProducto($id)
    {
        return $this->detalleProductoRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->detalleProductoRepository->search($search)
            : $this->detalleProductoRepository->getAll();
    }
}
