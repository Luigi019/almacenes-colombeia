<?php

namespace Database\Seeders;

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
        $rol1 = Role::create(['name'=>'Administrador de perfiles']);
        $rol2 = Role::create(['name'=>'Almacen']);
        $rol3 = Role::create(['name'=>'Ordenes']);
        

        Permission::create(['name'=>'home'])->syncRoles([$rol1,$rol2,$rol3]);

        Permission::create(['name'=>'almacen.index'])->syncRoles([$rol2,]);
        Permission::create(['name'=>'almacen.create'])->syncRoles([$rol2,]);
        Permission::create(['name'=>'almacen.show'])->syncRoles([$rol2]);
        Permission::create(['name'=>'almacen.edit'])->syncRoles([$rol2]);

        Permission::create(['name'=>'seguridad.index'])->syncRoles([$rol3,]);
        Permission::create(['name'=>'seguridad.create'])->syncRoles([$rol3,]);
        Permission::create(['name'=>'seguridad.show'])->syncRoles([$rol3,]);
        Permission::create(['name'=>'seguridad.edit'])->syncRoles([$rol3,]);


        Permission::create(['name'=>'roles.index'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'roles.create'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'roles.edit'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'roles.show'])->syncRoles([$rol1,]);
        
        Permission::create(['name'=>'user.index'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'user.create'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'user.edit'])->syncRoles([$rol1,]);
        Permission::create(['name'=>'user.show'])->syncRoles([$rol1,]);

        Permission::create(['name'=>'log.index'])->syncRoles([$rol1,]);

    }
}
