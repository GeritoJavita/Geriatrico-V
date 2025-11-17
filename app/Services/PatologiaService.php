<?php

namespace App\Services;

use App\Repositories\PatologiaRepository;

class PatologiaService
{
    protected $patologiaRepository;

    public function __construct(PatologiaRepository $patologiaRepository)
    {
        $this->patologiaRepository = $patologiaRepository;
    }

    public function listarPatologias()
    {
        return $this->patologiaRepository->getAll();
    }

    public function crearPatologia(array $data)
    {
        return $this->patologiaRepository->create($data);
    }

    public function actualizarPatologia($id, array $data)
    {
        return $this->patologiaRepository->update($id, $data);
    }

    public function eliminarPatologia($id)
    {
        return $this->patologiaRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->patologiaRepository->search($search)
            : $this->patologiaRepository->getAll();
    }
}
