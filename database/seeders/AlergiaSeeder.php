<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlergiaSeeder extends Seeder
{
    public function run()
    {
        DB::table('alergia')->insert([
            ['nombre' => 'Polen', 'fecha_diagnostico' => '2024-01-10'],
            ['nombre' => 'Ácaros del polvo', 'fecha_diagnostico' => '2023-12-03'],
            ['nombre' => 'Moho', 'fecha_diagnostico' => '2024-02-14'],
            ['nombre' => 'Pelo de gato', 'fecha_diagnostico' => '2024-05-22'],
            ['nombre' => 'Pelo de perro', 'fecha_diagnostico' => '2024-03-09'],
            ['nombre' => 'Picadura de abeja', 'fecha_diagnostico' => '2023-07-18'],
            ['nombre' => 'Picadura de avispa', 'fecha_diagnostico' => '2023-08-27'],
            ['nombre' => 'Maní', 'fecha_diagnostico' => '2025-01-12'],
            ['nombre' => 'Mariscos', 'fecha_diagnostico' => '2024-10-01'],
            ['nombre' => 'Leche', 'fecha_diagnostico' => '2023-11-15'],
            ['nombre' => 'Huevo', 'fecha_diagnostico' => '2023-09-05'],
            ['nombre' => 'Trigo / Gluten', 'fecha_diagnostico' => '2024-06-30'],
            ['nombre' => 'Soya', 'fecha_diagnostico' => '2024-04-21'],
            ['nombre' => 'Nueces (almendras, nuez, pistacho)', 'fecha_diagnostico' => '2024-12-19'],
            ['nombre' => 'Chocolate', 'fecha_diagnostico' => '2023-10-11'],
            ['nombre' => 'Penicilina', 'fecha_diagnostico' => '2022-02-17'],
            ['nombre' => 'Ibuprofeno', 'fecha_diagnostico' => '2021-05-08'],
            ['nombre' => 'Latex', 'fecha_diagnostico' => '2024-03-29'],
            ['nombre' => 'Níquel (contacto con metales)', 'fecha_diagnostico' => '2023-04-16'],
            ['nombre' => 'Fragancias / Perfumes', 'fecha_diagnostico' => '2024-07-07'],
        ]);
    }
}
