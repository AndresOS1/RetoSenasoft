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
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);


        $permission = Permission::create(['name' => 'pedido.index'])->syncRoles([$admin,$user]);
        $permission = Permission::create(['name' => 'pedido.crate'])->syncRoles([$admin,$user]);
        $permission = Permission::create(['name' => 'pedido.store'])->syncRoles([$admin,$user]);
        $permission = Permission::create(['name' => 'pedido.edit'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'pedido.update'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'pedido.delete'])->syncRoles([$admin]);

        $permission = Permission::create(['name' => 'producto.index'])->syncRoles([$admin, $user]);
        $permission = Permission::create(['name' => 'producto.crate'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'producto.store'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'producto.edit'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'producto.update'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'producto.delete'])->syncRoles([$admin]);

        $permission = Permission::create(['name' => 'proveedor.index'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'proveedor.crate'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'proveedor.store'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'proveedor.edit'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'proveedor.update'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'proveedor.delete'])->syncRoles([$admin]);


    }
}
