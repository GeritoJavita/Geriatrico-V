<?php

namespace App\Repositories;

use App\Models\MedicamentoResidente;

class MedicamentoResidenteRepository
{
    public function getAll()
    {
        return MedicamentoResidente::with(['residente', 'producto'])->get();
    }

    public function findById($id)
    {
        return MedicamentoResidente::find($id);
    }

    public function create(array $data)
    {
        return MedicamentoResidente::create($data);
    }

    public function update($id, array $data)
    {
        $medicamentoResidente = $this->findById($id);
        if ($medicamentoResidente) {
            $medicamentoResidente->update($data);
            return $medicamentoResidente;
        }
        return null;
    }

    public function destroy($id)
    {
        $medicamentoResidente = $this->findById($id);
        if ($medicamentoResidente) {
            $medicamentoResidente->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return MedicamentoResidente::with(['residente', 'producto'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('dosis', 'like', "%$search%")
                  ->orWhere('residente_id', $search)
                  ->orWhere('producto_id', $search);
            })
            ->get();
    }
}
