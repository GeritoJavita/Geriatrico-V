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

    public function crearResidenteConRelaciones(array $dataResidente, array $alergias = [], array $patologias = [])
    {
        // 1. Crear el residente PRIMERO con su ID manual
        $residente = $this->residenteRepository->create($dataResidente);
        
        // Verificar que el residente se creó correctamente
        if (!$residente || !$residente->id) {
            throw new \Exception('No se pudo crear el residente. Asegúrate de proporcionar un ID válido.');
        }
        
        // 2. Procesar alergias si existen
        if (!empty($alergias) && is_array($alergias)) {
            $alergiaIds = [];
            foreach ($alergias as $alergiaData) {
                if (isset($alergiaData['nombre'])) {
                    // Buscar o crear la alergia
                    $alergia = \App\Models\Alergia::firstOrCreate(
                        ['nombre' => $alergiaData['nombre']],
                        ['fecha_diagnostico' => $alergiaData['fecha'] ?? now()]
                    );
                    
                    $alergiaIds[] = $alergia->id;
                }
            }
            
            // Asociar todas las alergias de una vez
            if (!empty($alergiaIds)) {
                $residente->alergias()->sync($alergiaIds);
            }
        }
        
        // 3. Procesar patologías si existen
        if (!empty($patologias) && is_array($patologias)) {
            $patologiaIds = [];
            foreach ($patologias as $patologiaData) {
                if (isset($patologiaData['nombre'])) {
                    // Buscar o crear la patología
                    $patologia = \App\Models\Patologia::firstOrCreate(
                        ['nombre' => $patologiaData['nombre']],
                        ['fecha_diagnostico' => $patologiaData['fecha'] ?? now()]
                    );
                    
                    $patologiaIds[] = $patologia->id;
                }
            }
            
            // Asociar todas las patologías de una vez
            if (!empty($patologiaIds)) {
                $residente->patologias()->sync($patologiaIds);
            }
        }
        
        // Recargar el residente con sus relaciones
        return $residente->fresh(['alergias', 'patologias']);
    }
}
