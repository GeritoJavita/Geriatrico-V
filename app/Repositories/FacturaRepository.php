<?php

namespace App\Repositories;

use App\Models\Factura;
use App\Models\DetalleProducto;
use Illuminate\Support\Facades\Storage;

class FacturaRepository
{
    public function listar()
    {
        return Factura::with('productos')->orderBy('fecha', 'desc')->get();
    }

    public function crear(array $data)
    {
        // Subir archivo PDF si existe
        if (isset($data['archivo_pdf'])) {
            $ruta = $data['archivo_pdf']->store('facturas', 'public');
            $data['ruta'] = $ruta;
        }

        // Crear factura
        $factura = Factura::create([
            'precio' => $data['precio'],
            'nombre' => $data['nombre'],
            'fecha' => $data['fecha'],
            'tipo' => $data['tipo'],
            'ruta' => $data['ruta'] ?? null,
        ]);

        // Crear detalle
        DetalleProducto::create([
            'id_factura' => $factura->id,
            'id_producto' => $data['id_producto'],
            'subtotal' => $data['precio'],
        ]);

        return $factura;
    }

    public function eliminar($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->detalles()->delete();
        $factura->delete();
        return true;
    }
}
