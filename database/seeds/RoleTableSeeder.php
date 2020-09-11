<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'backoffice';
        $role->description = 'Back Office';
        $role->save();

        $role = new Role();
        $role->name = 'seller';
        $role->description = 'Vendedor';
        $role->save();

        $role = new Role();
        $role->name = 'supervisor_seller';
        $role->description = 'Supervisor';
        $role->save();

        $role = new Role();
        $role->name = 'salesmanager';
        $role->description = 'Jefe de Ventas';
        $role->save();

        $role = new Role();
        $role->name = 'warehouse';
        $role->description = 'Almacen';
        $role->save();

    }
}
