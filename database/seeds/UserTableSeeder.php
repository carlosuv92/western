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
        $role_admin = Role::where('name', 'admin')->first();

        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'CARLOS FELIPE';
        $user->surname = 'URCIA VEGA';
        $user->email = 'carlosuv92@gmail.com';
        $user->department = 1;
        $user->type_document = 1;
        $user->document = '12345678';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'JOHN';
        $user->surname = 'ZAFRA PINDAY';
        $user->email = 'john.zafra@vconnections.pe';
        $user->department = 1;
        $user->type_document = 1;
        $user->document = '12345679';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'MAYERLYS';
        $user->surname = 'MOLINA';
        $user->email = 'mayerlys.molina@vconnections.pe';
        $user->department = 1;
        $user->type_document = 1;
        $user->document = '12345678';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'ABEL';
        $user->surname = 'PARICAHUA';
        $user->email = 'abel.paricahua@vconnections.pe';
        $user->department = 1;
        $user->type_document = 1;
        $user->document = '1234567';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
