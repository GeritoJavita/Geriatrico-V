<?php

namespace App\Repositories;

use App\Models\ResumenAtencion;

class ResumenAtencionRepository
{
    public function getAll()
    {
        return ResumenAtencion::with(['residente', 'empleado'])->get();
    }

    public function findById($id)
    {
        return ResumenAtencion::find($id);
    }

    public function create(array $data)
    {
        return ResumenAtencion::create($data);
    }

    public function update($id, array $data)
    {
        $resumenAtencion = $this->findById($id);
        if ($resumenAtencion) {
            $resumenAtencion->update($data);
            return $resumenAtencion;
        }
        return null;
    }

    public function destroy($id)
    {
        $resumenAtencion = $this->findById($id);
        if ($resumenAtencion) {
            $resumenAtencion->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return ResumenAtencion::with(['residente', 'empleado'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('fecha', 'like', "%$search%")
                  ->orWhere('actividades', 'like', "%$search%")
                  ->orWhere('estado_general', 'like', "%$search%")
                  ->orWhere('residente_id', $search)
                  ->orWhere('empleado_id', $search);
            })
            ->get();
    }
}
