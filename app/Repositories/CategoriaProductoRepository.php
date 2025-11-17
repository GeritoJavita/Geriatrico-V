<?php

namespace App\Repositories;

use App\Models\CategoriaProducto;

class CategoriaProductoRepository
{
    public function getAll()
    {
        return CategoriaProducto::with(['productos'])->get();
    }

    public function findById($id)
    {
        return CategoriaProducto::find($id);
    }

    public function create(array $data)
    {
        return CategoriaProducto::create($data);
    }

    public function update($id, array $data)
    {
        $categoriaProducto = $this->findById($id);
        if ($categoriaProducto) {
            $categoriaProducto->update($data);
            return $categoriaProducto;
        }
        return null;
    }

    public function destroy($id)
    {
        $categoriaProducto = $this->findById($id);
        if ($categoriaProducto) {
            $categoriaProducto->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return CategoriaProducto::with(['productos'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search);
            })
            ->get();
    }
}
