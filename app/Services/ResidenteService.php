<?php

namespace App\Services;

use App\Repositories\ResidenteRepository;

class ResidenteService
{
    protected $residenteRepository;

    public function __construct(ResidenteRepository $residenteRepository)
    {
        $this->residenteRepository = $residenteRepository;
    }

    public function listarResidentes()
    {
        return $this->residenteRepository->getAll();
    }

    public function crearResidente(array $data)
    {
        return $this->residenteRepository->create($data);
    }

    public function actualizarResidente($id, array $data)
    {
        return $this->residenteRepository->update($id, $data);
    }

    public function eliminarResidente($id)
    {
        return $this->residenteRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->residenteRepository->search($search)
            : $this->residenteRepository->getAll();
    }
}
