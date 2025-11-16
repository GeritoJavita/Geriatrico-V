<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('producto')->insert([
            [
                'nombre' => 'Paracetamol 500mg',
                'precio' => 15.50,
                'fecha_caducidad' => '2025-01-01',
                'dosis' => '500mg cada 8h',
                'indicaciones' => 'Para dolor y fiebre',
                'lote' => 'L-001',
                'presentacion' => 'Caja 10 unidades',
                'stock' => 15,
                'categoria_id' => 1,
                'proveedor_id' => 1,
            ],
            [
                'nombre' => 'Leche Entera',
                'precio' => 25,
                'fecha_caducidad' => '2025-11-30',
                'dosis' => '1 vaso diario',
                'indicaciones' => 'Alimento líquido',
                'lote' => 'L-123',
                'presentacion' => 'Botella 1L',
                'stock' => 22,
                'categoria_id' => 2,
                'proveedor_id' => 2,
            ],
            [
                'nombre' => 'Jeringa 10ml',
                'precio' => 8.75,
                'fecha_caducidad' => '2027-12-31',
                'dosis' => 'N/A',
                'indicaciones' => 'Uso médico',
                'lote' => 'L-555',
                'presentacion' => 'Paquete 50 unidades',
                'stock' => 4,
                'categoria_id' => 3,
                'proveedor_id' => 2,
            ],
        ]);
    }
}
