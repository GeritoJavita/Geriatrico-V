<?php

namespace App\Services;

use App\Repositories\EmpleadoRepository;

class EmpleadoService
{
    protected $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }

    public function listarEmpleados()
    {
        return $this->empleadoRepository->getAll();
    }

    public function crearEmpleado(array $data)
    {
        return $this->empleadoRepository->create($data);
    }

    public function actualizarEmpleado($id, array $data)
    {
        return $this->empleadoRepository->update($id, $data);
    }

    public function eliminarEmpleado($id)
    {
        return $this->empleadoRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->empleadoRepository->search($search)
            : $this->empleadoRepository->getAll();
    }
}
