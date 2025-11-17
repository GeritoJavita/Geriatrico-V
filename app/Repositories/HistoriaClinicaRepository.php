<?php

namespace App\Repositories;

use App\Models\HistoriaClinica;

class HistoriaClinicaRepository
{
    public function getAll()
    {
        return HistoriaClinica::with(['residente'])->get();
    }

    public function findById($id)
    {
        return HistoriaClinica::find($id);
    }

    public function create(array $data)
    {
        return HistoriaClinica::create($data);
    }

    public function update($id, array $data)
    {
        $historiaClinica = $this->findById($id);
        if ($historiaClinica) {
            $historiaClinica->update($data);
            return $historiaClinica;
        }
        return null;
    }

    public function destroy($id)
    {
        $historiaClinica = $this->findById($id);
        if ($historiaClinica) {
            $historiaClinica->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return HistoriaClinica::with(['residente'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('fecha', 'like', "%$search%")
                  ->orWhere('diagnostico', 'like', "%$search%")
                  ->orWhere('residente_id', $search);
            })
            ->get();
    }
}
