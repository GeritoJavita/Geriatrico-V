<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Paracetamol 500mg',
                'precio' => 15.50,
                'fecha_caducidad' => null,
                'dosis' => '500mg cada 8h',
                'indicaciones' => 'Para dolor y fiebre',
                'lote' => null,
                'presentacion' => 'Caja 10 unidades',
                'categoria_id' => 1,
                'proveedor_id' => 1,
            ],
            [
                'nombre' => 'Leche Entera',
                'precio' => 25.00,
                'fecha_caducidad' => '2025-11-30',
                'dosis' => null,
                'indicaciones' => null,
                'lote' => 'L-123',
                'presentacion' => 'Botella 1L',
                'categoria_id' => 2,
                'proveedor_id' => 2,
            ],
            [
                'nombre' => 'Jeringa 10ml',
                'precio' => 8.75,
                'fecha_caducidad' => null,
                'dosis' => null,
                'indicaciones' => null,
                'lote' => null,
                'presentacion' => 'Paquete 50 unidades',
                'categoria_id' => 3,
                'proveedor_id' => 2,
            ],
        ]);
    }
}
