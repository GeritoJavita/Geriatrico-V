<?php

namespace App\Repositories;

use App\Models\QuejaNovedad;

class QuejaNovedadRepository
{
    public function getAll()
    {
        return QuejaNovedad::with(['familiar'])->get();
    }

    public function findById($id)
    {
        return QuejaNovedad::find($id);
    }

    public function create(array $data)
    {
        return QuejaNovedad::create($data);
    }

    public function update($id, array $data)
    {
        $quejaNovedad = $this->findById($id);
        if ($quejaNovedad) {
            $quejaNovedad->update($data);
            return $quejaNovedad;
        }
        return null;
    }

    public function destroy($id)
    {
        $quejaNovedad = $this->findById($id);
        if ($quejaNovedad) {
            $quejaNovedad->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return QuejaNovedad::with(['familiar'])
            ->where(function ($q) use ($search) {
                $q->where('tipo', 'like', "%$search%")
                  ->orWhere('descripcion', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('fecha', 'like', "%$search%")
                  ->orWhere('familiar_id', $search);
            })
            ->get();
    }
}
