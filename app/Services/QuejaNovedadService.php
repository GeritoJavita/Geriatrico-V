<?php

namespace App\Services;

use App\Repositories\QuejaNovedadRepository;

class QuejaNovedadService
{
    protected $quejaNovedadRepository;

    public function __construct(QuejaNovedadRepository $quejaNovedadRepository)
    {
        $this->quejaNovedadRepository = $quejaNovedadRepository;
    }

    public function listarQuejasNovedades()
    {
        return $this->quejaNovedadRepository->getAll();
    }

    public function crearQuejaNovedad(array $data)
    {
        return $this->quejaNovedadRepository->create($data);
    }

    public function actualizarQuejaNovedad($id, array $data)
    {
        return $this->quejaNovedadRepository->update($id, $data);
    }

    public function eliminarQuejaNovedad($id)
    {
        return $this->quejaNovedadRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->quejaNovedadRepository->search($search)
            : $this->quejaNovedadRepository->getAll();
    }
}
