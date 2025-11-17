<?php

namespace App\Services;

use App\Repositories\AlergiaRepository;

class AlergiaService
{
    protected $alergiaRepository;

    public function __construct(AlergiaRepository $alergiaRepository)
    {
        $this->alergiaRepository = $alergiaRepository;
    }

    public function listarAlergias()
    {
        return $this->alergiaRepository->getAll();
    }

    public function crearAlergia(array $data)
    {
        return $this->alergiaRepository->create($data);
    }

    public function actualizarAlergia($id, array $data)
    {
        return $this->alergiaRepository->update($id, $data);
    }

    public function eliminarAlergia($id)
    {
        return $this->alergiaRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->alergiaRepository->search($search)
            : $this->alergiaRepository->getAll();
    }
}
