<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacturaSeeder extends Seeder
{
    public function run()
    {
        DB::table('facturas')->insert([
            [
                'precio' => 1550.00,
                'nombre' => 'Compra Medicamentos Noviembre',
                'fecha' => '2025-10-17',
                'tipo' => 'Compra',
                'ruta' => '/facturas/fac1.pdf',
            ],
            [
                'precio' => 2500.00,
                'nombre' => 'Compra Alimentos',
                'fecha' => '2025-10-16',
                'tipo' => 'Compra',
                'ruta' => '/facturas/fac2.pdf',
            ],
        ]);
    }
}
