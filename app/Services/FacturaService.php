<?php

namespace App\Services;

use App\Repositories\FacturaRepository;
use Illuminate\Support\Facades\DB;

class FacturaService
{
    protected $facturaRepository;

    public function __construct(FacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function listarFacturas()
    {
        return $this->facturaRepository->listar();
    }

    public function crearFactura(array $data)
    {
        DB::beginTransaction();
        try {
            $factura = $this->facturaRepository->crear($data);
            DB::commit();
            return $factura;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function eliminarFactura($id)
    {
        return $this->facturaRepository->eliminar($id);
    }
}
