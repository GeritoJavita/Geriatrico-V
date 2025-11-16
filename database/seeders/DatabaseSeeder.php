<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProveedorSeeder::class,
            CategoriaProductoSeeder::class,
            ProductoSeeder::class,
            FacturaSeeder::class,
            DetalleProductoSeeder::class,
            RoleSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}
