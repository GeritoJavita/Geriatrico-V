<?php

namespace App\Repositories;

use App\Models\Residente;

class ResidenteRepository
{
    public function getAll()
    {
        return Residente::with(['historiasClinicas', 'familiares', 'alergias', 'patologias'])->get();
    }

    public function findById($id)
    {
        return Residente::find($id);
    }

    public function create(array $data)
    {
        return Residente::create($data);
    }

    public function update($id, array $data)
    {
        $residente = $this->findById($id);
        if ($residente) {
            $residente->update($data);
            return $residente;
        }
        return null;
    }

    public function destroy($id)
    {
        $residente = $this->findById($id);
        if ($residente) {
            $residente->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Residente::with(['historiasClinicas', 'familiares', 'alergias', 'patologias'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('apellido', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('telefono', 'like', "%$search%")
                  ->orWhere('habitacion', 'like', "%$search%");
            })
            ->get();
    }
}
