<?php

namespace App\Repositories;

use App\Models\DetalleProducto;

class DetalleProductoRepository
{
    public function getAll()
    {
        return DetalleProducto::with(['factura', 'producto'])->get();
    }

    public function findById($id)
    {
        return DetalleProducto::find($id);
    }

    public function create(array $data)
    {
        return DetalleProducto::create($data);
    }

    public function update($id, array $data)
    {
        $detalleProducto = $this->findById($id);
        if ($detalleProducto) {
            $detalleProducto->update($data);
            return $detalleProducto;
        }
        return null;
    }

    public function destroy($id)
    {
        $detalleProducto = $this->findById($id);
        if ($detalleProducto) {
            $detalleProducto->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return DetalleProducto::with(['factura', 'producto'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('id_factura', $search)
                  ->orWhere('id_producto', $search)
                  ->orWhere('subtotal', $search);
            })
            ->get();
    }
}
