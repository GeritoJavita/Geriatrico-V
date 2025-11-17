<?php

namespace App\Services;

use App\Repositories\FamiliarRepository;

class FamiliarService
{
    protected $familiarRepository;

    public function __construct(FamiliarRepository $familiarRepository)
    {
        $this->familiarRepository = $familiarRepository;
    }

    public function listarFamiliares()
    {
        return $this->familiarRepository->getAll();
    }

    public function crearFamiliar(array $data)
    {
        return $this->familiarRepository->create($data);
    }

    public function actualizarFamiliar($id, array $data)
    {
        return $this->familiarRepository->update($id, $data);
    }

    public function eliminarFamiliar($id)
    {
        return $this->familiarRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->familiarRepository->search($search)
            : $this->familiarRepository->getAll();
    }
}
