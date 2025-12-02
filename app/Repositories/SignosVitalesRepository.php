<?php

namespace App\Repositories;

use App\Models\SignosVitales;

class SignosVitalesRepository
{
    protected $model;

    public function __construct(SignosVitales $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with(['residente', 'empleado'])->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
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
        return $this->model->with(['residente', 'empleado'])
            ->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('fecha', 'like', "%$search%")
                    ->orWhere('hora', 'like', "%$search%")
                    ->orWhere('residente_id', $search)
                    ->orWhere('empleado_id', $search);
            })
            ->get();
    }

    public function getQuery()
    {
        return $this->model->newQuery();
    }

    // Un método para obtener todos los signos vitales por residente:
    public function listarPorResidente($residenteId)
    {
        return $this->model->where('residente_id', $residenteId);
    }
}
