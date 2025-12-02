<?php

namespace App\Services;

use App\Repositories\SignosVitalesRepository;

class SignosVitalesService
{
    protected $signosVitalesRepository;

    public function __construct(SignosVitalesRepository $signosVitalesRepository)
    {
        $this->signosVitalesRepository = $signosVitalesRepository;
    }

    public function listarSignosVitales()
    {
        return $this->signosVitalesRepository->getAll();
    }

    public function crearSignosVitales(array $data)
    {
        return $this->signosVitalesRepository->create($data);
    }

    public function actualizarSignosVitales($id, array $data)
    {
        return $this->signosVitalesRepository->update($id, $data);
    }

    public function eliminarSignosVitales($id)
    {
        return $this->signosVitalesRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->signosVitalesRepository->search($search)
            : $this->signosVitalesRepository->getAll();
    }
    
}
