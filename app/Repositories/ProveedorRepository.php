<?php

namespace App\Repositories;

use App\Models\Proveedor;

class ProveedorRepository
{
    public function listar()
    {
        return Proveedor::orderBy('nombre')->get();
    }

    public function obtenerPorId($id)
    {
        return Proveedor::findOrFail($id);
    }

    public function crear(array $data)
    {
        return Proveedor::create($data);
    }

    public function actualizar($id, array $data)
    {
        $proveedor = $this->obtenerPorId($id);
        $proveedor->update($data);
        return $proveedor;
    }

    public function eliminar($id)
    {
        $proveedor = $this->obtenerPorId($id);
        return $proveedor->delete();
    }
}
