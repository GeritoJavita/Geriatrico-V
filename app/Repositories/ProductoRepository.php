<?php

namespace App\Repositories;

use App\Models\Producto;

class ProductoRepository
{
    public function getAll()
    {
        return Producto::with(['categoria', 'proveedor'])->get();
    }

    public function create(array $data)
    {
        return Producto::create($data);
    }

    public function findById(int $id)
    {
        return Producto::findOrFail($id);
    }

    public function delete(int $id)
    {
        return Producto::destroy($id);
    }

    public function search($search)
    {
        return Producto::query()
            ->where('nombre', 'like', "%$search%")
            ->orWhere('id', $search)
            ->orWhere('proveedor_id', $search)
            ->get();
    }
}
