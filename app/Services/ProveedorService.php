<?php

namespace App\Services;

use App\Repositories\ProveedorRepository;

class ProveedorService
{
    protected $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepository)
    {
        $this->proveedorRepository = $proveedorRepository;
    }

    public function listarProveedores()
    {
        return $this->proveedorRepository->listar();
    }

    public function obtenerProveedor($id)
    {
        return $this->proveedorRepository->obtenerPorId($id);
    }

    public function crearProveedor(array $data)
    {
        return $this->proveedorRepository->crear($data);
    }

    public function actualizarProveedor($id, array $data)
    {
        return $this->proveedorRepository->actualizar($id, $data);
    }

    public function eliminarProveedor($id)
    {
        return $this->proveedorRepository->eliminar($id);
    }
}
