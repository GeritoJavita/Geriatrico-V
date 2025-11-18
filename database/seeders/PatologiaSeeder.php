<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatologiaSeeder extends Seeder
{
    public function run()
    {
        DB::table('patologia')->insert([
            ['nombre' => 'Anemia', 'fecha_diagnostico' => '2024-01-10'],
            ['nombre' => 'Hipertensión arterial', 'fecha_diagnostico' => '2023-11-05'],
            ['nombre' => 'Diabetes tipo 2', 'fecha_diagnostico' => '2024-02-20'],
            ['nombre' => 'Artritis reumatoide', 'fecha_diagnostico' => '2023-09-14'],
            ['nombre' => 'Osteoporosis', 'fecha_diagnostico' => '2024-03-01'],
            ['nombre' => 'Insuficiencia renal crónica', 'fecha_diagnostico' => '2023-12-02'],
            ['nombre' => 'Asma', 'fecha_diagnostico' => '2024-01-25'],
            ['nombre' => 'EPOC', 'fecha_diagnostico' => '2023-10-17'],
            ['nombre' => 'Hipotiroidismo', 'fecha_diagnostico' => '2024-02-02'],
            ['nombre' => 'Hipertiroidismo', 'fecha_diagnostico' => '2024-01-29'],
            ['nombre' => 'Enfermedad coronaria', 'fecha_diagnostico' => '2023-08-22'],
            ['nombre' => 'Arritmia cardiaca', 'fecha_diagnostico' => '2023-09-30'],
            ['nombre' => 'Parkinson', 'fecha_diagnostico' => '2023-07-12'],
            ['nombre' => 'Alzhéimer', 'fecha_diagnostico' => '2023-11-27'],
            ['nombre' => 'Depresión', 'fecha_diagnostico' => '2024-01-05'],
            ['nombre' => 'Ansiedad generalizada', 'fecha_diagnostico' => '2023-10-11'],
            ['nombre' => 'Fibromialgia', 'fecha_diagnostico' => '2023-09-08'],
            ['nombre' => 'Insuficiencia cardiaca', 'fecha_diagnostico' => '2023-12-19'],
            ['nombre' => 'Gastritis crónica', 'fecha_diagnostico' => '2024-02-12'],
            ['nombre' => 'Colitis ulcerativa', 'fecha_diagnostico' => '2023-07-28'],
        ]);
    }
}
