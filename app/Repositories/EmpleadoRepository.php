<?php

namespace App\Repositories;

use App\Models\Empleado;

class EmpleadoRepository
{
    public function getAll()
    {
        return Empleado::with(['usuario', 'signosVitales', 'resumenAtenciones'])->get();
    }

    public function findById($id)
    {
        return Empleado::find($id);
    }

    public function create(array $data)
    {
        return Empleado::create($data);
    }

    public function update($id, array $data)
    {
        $empleado = $this->findById($id);
        if ($empleado) {
            $empleado->update($data);
            return $empleado;
        }
        return null;
    }

    public function destroy($id)
    {
        $empleado = $this->findById($id);
        if ($empleado) {
            $empleado->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Empleado::with(['usuario', 'signosVitales', 'resumenAtenciones'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('fecha_ingreso', 'like', "%$search%")
                  ->orWhere('salario', $search)
                  ->orWhere('usuario_id', $search);
            })
            ->get();
    }
}
