<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventario')->insert([
            ['id_producto' => 1, 'stock' => 100, 'cantidad' => 100, 'ubicacion' => 'Almacén A'],
            ['id_producto' => 2, 'stock' => 50,  'cantidad' => 50,  'ubicacion' => 'Almacén B'],
            ['id_producto' => 3, 'stock' => 200, 'cantidad' => 200, 'ubicacion' => 'Almacén C'],
        ]);
    }
}
