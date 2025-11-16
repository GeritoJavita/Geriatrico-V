<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Usuario normal
        $usuario = Usuario::create([
            'id' => 1,
            'nombre' => 'Diego',
            'apellido' => 'Bautista',
            'correo' => 'diego@gmail.com',
            'direccion' => 'Calle 123',
            'clave' => Hash::make('12345678'),
        ]);
        $usuario->assignRole('user'); // Asignar rol 'user'

        // Usuario admin
        $admin = Usuario::create([
            'id' => 2,
            'nombre' => 'Admin',
            'apellido' => null,
            'correo' => 'admin@gmail.com',
            'direccion' => null,
            'clave' => Hash::make('123456789'),
        ]);
        $admin->assignRole('admin'); // Asignar rol 'admin'
    }
}