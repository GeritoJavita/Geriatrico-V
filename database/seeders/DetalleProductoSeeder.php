<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('detalle_producto')->insert([
            ['subtotal' => 155.00, 'id_factura' => 1, 'id_producto' => 1],
            ['subtotal' => 250.00, 'id_factura' => 2, 'id_producto' => 2],
            ['subtotal' => 875.00, 'id_factura' => 1, 'id_producto' => 3],
        ]);
    }
}
