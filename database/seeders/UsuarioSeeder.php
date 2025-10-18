<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'correo' => 'juan.perez@example.com',
                'direccion' => 'Calle 123',
                'clave' => bcrypt('clave123'),
                'rol_id' => 1,
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Gómez',
                'correo' => 'ana.gomez@example.com',
                'direccion' => 'Av. Siempre Viva 456',
                'clave' => bcrypt('clave456'),
                'rol_id' => 2,
            ],
        ]);
    }

}
