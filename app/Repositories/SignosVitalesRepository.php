<?php

namespace App\Repositories;

use App\Models\SignosVitales;

class SignosVitalesRepository
{
    public function getAll()
    {
        return SignosVitales::with(['residente', 'empleado'])->get();
    }

    public function findById($id)
    {
        return SignosVitales::find($id);
    }

    public function create(array $data)
    {
        return SignosVitales::create($data);
    }

    public function update($id, array $data)
    {
        $signosVitales = $this->findById($id);
        if ($signosVitales) {
            $signosVitales->update($data);
            return $signosVitales;
        }
        return null;
    }

    public function destroy($id)
    {
        $signosVitales = $this->findById($id);
        if ($signosVitales) {
            $signosVitales->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return SignosVitales::with(['residente', 'empleado'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('fecha', 'like', "%$search%")
                  ->orWhere('hora', 'like', "%$search%")
                  ->orWhere('residente_id', $search)
                  ->orWhere('empleado_id', $search);
            })
            ->get();
    }
}
