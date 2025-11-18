<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('residente')->insert([
            [
                'id' => 1,
                'nombre' => 'Carlos',
                'apellido' => 'Gómez',
                'fecha_nacimiento' => '1940-06-15',
                'telefono' => '3001234567',
                'fecha_ingreso' => '2023-01-10',
                'tipo_sangre' => 'O+',
                'genero' => 'Masculino',
                'telefono_emerg' => '3109876543',
                'habitacion' => 'A101',
                'cama' => 1,
                'condicion_medica' => 'Hipertensión',
                'direccion' => 'Cra 10 #20-30',
                'altura' => 170,
                'peso' => 725,
                'eps' => 'SURA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'María',
                'apellido' => 'Pérez',
                'fecha_nacimiento' => '1938-09-22',
                'telefono' => '3015558899',
                'fecha_ingreso' => '2022-11-05',
                'tipo_sangre' => 'A-',
                'genero' => 'Femenino',
                'telefono_emerg' => '3112211334',
                'habitacion' => 'B205',
                'cama' => 2,
                'condicion_medica' => 'Diabetes tipo 2',
                'direccion' => 'Cl 45 #12-60',
                'altura' => 158,
                'peso' => 620,
                'eps' => 'Compensar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre' => 'Luis',
                'apellido' => 'Ramírez',
                'fecha_nacimiento' => '1945-02-18',
                'telefono' => '3023344556',
                'fecha_ingreso' => '2024-02-01',
                'tipo_sangre' => 'B+',
                'genero' => 'Masculino',
                'telefono_emerg' => '3158765432',
                'habitacion' => 'C303',
                'cama' => 1,
                'condicion_medica' => 'Artritis',
                'direccion' => 'Av 3 #45-90',
                'altura' => 165,
                'peso' => 700,
                'eps' => 'Sanitas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
