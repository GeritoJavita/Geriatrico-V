<?php

namespace App\Services;

use App\Repositories\HistoriaClinicaRepository;

class HistoriaClinicaService
{
    protected $historiaClinicaRepository;

    public function __construct(HistoriaClinicaRepository $historiaClinicaRepository)
    {
        $this->historiaClinicaRepository = $historiaClinicaRepository;
    }

    public function listarHistoriasClinicas()
    {
        return $this->historiaClinicaRepository->getAll();
    }

    public function crearHistoriaClinica(array $data)
    {
        return $this->historiaClinicaRepository->create($data);
    }

    public function actualizarHistoriaClinica($id, array $data)
    {
        return $this->historiaClinicaRepository->update($id, $data);
    }

    public function eliminarHistoriaClinica($id)
    {
        return $this->historiaClinicaRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->historiaClinicaRepository->search($search)
            : $this->historiaClinicaRepository->getAll();
    }
}
