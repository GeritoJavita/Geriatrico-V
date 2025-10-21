<?php

namespace App\Repositories;

use App\Models\Inventario;

class InventarioRepository
{
    public function getAll()
    {
        return Inventario::with('producto')->get();
    }

    public function create(array $data)
    {
        return Inventario::create($data);
    }

    public function search($search)
    {
        return Inventario::with('producto')
            ->whereHas('producto', function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search);
            })
            ->orWhere('stock', $search)
            ->orWhere('cantidad', $search)
            ->get();
    }
}
