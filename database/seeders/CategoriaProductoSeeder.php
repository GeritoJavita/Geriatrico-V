<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('categoria_producto')->insert([
            ['nombre' => 'Medicamento', 'descripcion' => 'Productos farmacéuticos'],
            ['nombre' => 'Alimento', 'descripcion' => 'Productos alimenticios'],
            ['nombre' => 'Insumo', 'descripcion' => 'Materiales e insumos médicos'],
        ]);
    }
}
