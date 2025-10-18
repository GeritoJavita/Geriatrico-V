<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UsuarioSeeder::class,
            ProveedorSeeder::class,
            CategoriaProductoSeeder::class,
            ProductoSeeder::class,
            InventarioSeeder::class,
            FacturaSeeder::class,
            DetalleProductoSeeder::class,
        ]);
    }
}
