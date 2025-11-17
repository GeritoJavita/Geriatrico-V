<?php

namespace App\Services;

use App\Repositories\ResumenAtencionRepository;

class ResumenAtencionService
{
    protected $resumenAtencionRepository;

    public function __construct(ResumenAtencionRepository $resumenAtencionRepository)
    {
        $this->resumenAtencionRepository = $resumenAtencionRepository;
    }

    public function listarResumenesAtencion()
    {
        return $this->resumenAtencionRepository->getAll();
    }

    public function crearResumenAtencion(array $data)
    {
        return $this->resumenAtencionRepository->create($data);
    }

    public function actualizarResumenAtencion($id, array $data)
    {
        return $this->resumenAtencionRepository->update($id, $data);
    }

    public function eliminarResumenAtencion($id)
    {
        return $this->resumenAtencionRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->resumenAtencionRepository->search($search)
            : $this->resumenAtencionRepository->getAll();
    }
}
