<?php

namespace App\Services;

use App\Repositories\MedicamentoResidenteRepository;

class MedicamentoResidenteService
{
    protected $medicamentoResidenteRepository;

    public function __construct(MedicamentoResidenteRepository $medicamentoResidenteRepository)
    {
        $this->medicamentoResidenteRepository = $medicamentoResidenteRepository;
    }

    public function listarMedicamentosResidentes()
    {
        return $this->medicamentoResidenteRepository->getAll();
    }

    public function crearMedicamentoResidente(array $data)
    {
        return $this->medicamentoResidenteRepository->create($data);
    }

    public function actualizarMedicamentoResidente($id, array $data)
    {
        return $this->medicamentoResidenteRepository->update($id, $data);
    }

    public function eliminarMedicamentoResidente($id)
    {
        return $this->medicamentoResidenteRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->medicamentoResidenteRepository->search($search)
            : $this->medicamentoResidenteRepository->getAll();
    }
}
