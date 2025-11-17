<?php

namespace App\Repositories;

use App\Models\Alergia;

class AlergiaRepository
{
    public function getAll()
    {
        return Alergia::with(['residentes'])->get();
    }

    public function findById($id)
    {
        return Alergia::find($id);
    }

    public function create(array $data)
    {
        return Alergia::create($data);
    }

    public function update($id, array $data)
    {
        $alergia = $this->findById($id);
        if ($alergia) {
            $alergia->update($data);
            return $alergia;
        }
        return null;
    }

    public function destroy($id)
    {
        $alergia = $this->findById($id);
        if ($alergia) {
            $alergia->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Alergia::with(['residente'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('fecha_diagnostico', 'like', "%$search%");
            })
            ->get();
    }
}
