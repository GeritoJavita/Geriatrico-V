<?php

namespace Database\Seeders;

use App\Models\Alergia;
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
            AlergiaSeeder::class,
            PatologiaSeeder::class,
            ResidenteSeeder::class,
        ]);
    }
}
