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
    $proveedor = $this->proveedorRepository->obtenerPorId($id);

    if (!$proveedor) {
        throw new \Exception("Proveedor no encontrado.");
    }

 
    if ($proveedor->productos()->count() > 0) {
        throw new \Exception("No se puede eliminar este proveedor porque tiene productos asociados.");
    }

    return $this->proveedorRepository->eliminar($id);
}

 public function count()
 {
    return $this->proveedorRepository->count();
 }
}
