<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\UserRelation;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = date("Y-m-d H:i:s");
        $role_admin = Role::where('name', 'admin')->first();
        $role_jefe = Role::where('name', 'salesmanager')->first();

        $user = new User();
        $user->name = 'CARLOS FELIPE URCIA VEGA';
        $user->phone = '999999991';
        $user->address = 'AV ROSA DE AMERICA 914';
        $user->email = 'CARLOSUV92@GMAIL.COM';
        $user->type_document = 1;
        $user->document = '12345678';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'ABEL PARICAHUA';
        $user->email = 'abel.paricahua@vconnections.pe';
        $user->document = '1234567';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'JOHN ZAFRA';
        $user->email = 'john.zafra@vconnections.pe';
        $user->document = '123456';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'PAOLO ENTEL';
        $user->email = 'paolo@vconnections.pe';
        $user->document = '1234';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'HUGO LUYO';
        $user->email = 'luyo@vconnections.pe';
        $user->document = '666';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        /** */
        $user = new User();
        $user->name = 'PRIETO RINCON JAIRO ENRIQUE';
        $user->email = 'jairo.prieto@vconnections.pe';
        $user->document = '999999991';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_jefe);

        $relation = new UserRelation();
        $relation->user = $user->id;
        $relation->supervisor = $user->id;
        $relation->salesmanager = $user->id;
        $relation->save();

        /** */
        $user = new User();
        $user->name = 'MEDINA OCHOA JONATHAN JOSE';
        $user->email = 'jhonatan.medina@vconnections.pe';
        $user->document = '999999992';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_jefe);

        $relation = new UserRelation();
        $relation->user = $user->id;
        $relation->supervisor = $user->id;
        $relation->salesmanager = $user->id;
        $relation->save();


        /** */
        $user = new User();
        $user->name = 'CESADO';
        $user->email = 'cesado@vconnections.pe';
        $user->document = '999999993';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_jefe);

        $relation = new UserRelation();
        $relation->user = $user->id;
        $relation->supervisor = $user->id;
        $relation->salesmanager = $user->id;
        $relation->save();


        /** */
        $user = new User();
        $user->name = 'GERENCIA';
        $user->email = 'gerencia@vconnections.pe';
        $user->document = '999999994';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_jefe);

        $relation = new UserRelation();
        $relation->user = $user->id;
        $relation->supervisor = $user->id;
        $relation->salesmanager = $user->id;
        $relation->save();


    }
}
