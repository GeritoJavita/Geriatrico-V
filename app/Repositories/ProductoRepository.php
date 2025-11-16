<?php

namespace App\Repositories;

use App\Models\Producto;

class ProductoRepository
{
    public function getAll()
    {
        return Producto::with(['categoria', 'proveedor'])->get();
    }

    public function findById($id)
    {
        return Producto::find($id); // o findOrFail($id) si quieres lanzar excepción
    }

    public function create(array $data)
    {
        return Producto::create($data);
    }

    public function update($id, array $data)
    {
        $producto = $this->findById($id);
        if ($producto) {
            $producto->update($data);
            return $producto;
        }
        return null;
    }

    public function destroy($id)
    {
        $producto = $this->findById($id);
        if ($producto) {
            $producto->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Producto::with(['categoria', 'proveedor'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('stock', $search)
                  ->orWhere('precio', $search)
                  ->orWhere('lote', 'like', "%$search%");
            })
            ->get();
    }
}
