<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1= Role::create(['name'=>'admin']);
        $rol2= Role::create(['name'=>'employ']);
        $rol3= Role::create(['name'=>'user']);
        Permission::create(['name'=>'dashboard_admin'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'inventario.index'])->assignRole([$rol1,$rol2]);//así se asignan varios roles a un permiso
        Permission::create(['name'=>'inventario.index.edit'])->assignRole($rol1);//así se asigna un rol a un permiso
        Permission::create(['name'=>'inventario.index.destroy'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'inventario.index.create.producto'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'inventario.index.proveedor'])->assignRole([$rol1,$rol2]);
    }
}
