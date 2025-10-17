<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            [
                'nombre' => 'Farmacéutica ABC',
                'direccion' => 'Calle Medicamento 12',
                'telefono' => '3001234567',
                'correo' => 'contacto@abc.com',
            ],
            [
                'nombre' => 'Distribuidora XYZ',
                'direccion' => 'Av. Insumos 45',
                'telefono' => '3007654321',
                'correo' => 'ventas@xyz.com',
            ],
        ]);
    }
}
