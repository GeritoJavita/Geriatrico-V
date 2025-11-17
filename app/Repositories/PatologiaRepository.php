<?php

namespace App\Repositories;

use App\Models\Patologia;

class PatologiaRepository
{
    public function getAll()
    {
        return Patologia::with(['residentes'])->get();
    }

    public function findById($id)
    {
        return Patologia::find($id);
    }

    public function create(array $data)
    {
        return Patologia::create($data);
    }

    public function update($id, array $data)
    {
        $patologia = $this->findById($id);
        if ($patologia) {
            $patologia->update($data);
            return $patologia;
        }
        return null;
    }

    public function destroy($id)
    {
        $patologia = $this->findById($id);
        if ($patologia) {
            $patologia->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Patologia::with(['residentes'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('fecha_diagnostico', 'like', "%$search%");
            })
            ->get();
    }
}
