<?php

namespace App\Services;

use App\Repositories\ResidenteRepository;
use Carbon\Carbon;

class ResidenteService
{
    protected $residenteRepository;

    public function __construct(ResidenteRepository $residenteRepository)
    {
        $this->residenteRepository = $residenteRepository;
    }


    public function listarResidentes()
    {
        $residentes = $this->residenteRepository->getAll();

        $residentes->each(function ($residente) {
            if ($residente->fecha_nacimiento) {
                // Carbon interpreta automáticamente formato Y-m-d de date
                $residente->edad = intval(Carbon::parse($residente->fecha_nacimiento)->diffInYears(Carbon::now()));
            } else {
                $residente->edad = null;
            }
        });

        return $residentes;
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

    public function buscarResidentes($search)
    {
        $residentes = $this->residenteRepository->search($search);
        
        $residentes->each(function ($residente) {
            if ($residente->fecha_nacimiento) {
                $residente->edad = intval(Carbon::parse($residente->fecha_nacimiento)->diffInYears(Carbon::now()));
            } else {
                $residente->edad = null;
            }
        });

        return $residentes;
    }

    public function obtenerResidentePorId($id)
    {
        $residente = $this->residenteRepository->findById($id);
        
        if ($residente && $residente->fecha_nacimiento) {
            $residente->edad = intval(Carbon::parse($residente->fecha_nacimiento)->diffInYears(Carbon::now()));
        }
        
        return $residente;
    }
}
