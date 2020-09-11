<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = date("Y-m-d H:i:s");

        $t_doc = ['DNI', 'PASAPORTE', 'PTP', 'CEDULA'];

        for ($i = 0; $i < count($t_doc); $i++) {
            DB::table('type_documents')->insert([
                'id' => $i + 1,
                'name' => $t_doc[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $c_doc = ['DNI', 'RUC', 'CE'];

        for ($i = 0; $i < count($c_doc); $i++) {
            DB::table('client_documents')->insert([
                'id' => $i + 1,
                'name' => $c_doc[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'CARLOS FELIPE';
        $user->surname = 'URCIA VEGA';
        $user->email = 'CARLOSUV92@GMAIL.COM';
        $user->address = 'VICOSYS';
        $user->type_document = 1;
        $user->document = '12345678';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'JOHN';
        $user->surname = 'ZAFRA PINDAY';
        $user->email = 'JOHN.ZAFRA@VCONNECTIONS.PE';
        $user->address = 'VICOSYS';
        $user->type_document = 1;
        $user->document = '12345679';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);




        $marca = ['POCKET PRO', 'POCKET POS'];
        for ($i = 0; $i < count($marca); $i++) {
            DB::table('brands')->insert([
                'id' => $i + 1,
                'name' => $marca[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $models = ['POCKET', 'POS', 'TU VITRINA', 'OTROS'];
        for ($i = 0; $i < count($models); $i++) {
            DB::table('model_pockets')->insert([
                'id' => $i + 1,
                'name' => $models[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $fallos = ['ALMACEN', 'EN CAMPO', 'VENDIDO', 'DEVOLUCION VICO', 'ROBADO', 'DEVUELTO'];

        for ($i = 0; $i < count($fallos); $i++) {
            DB::table('type_pos_fails')->insert([
                'id' => $i + 1,
                'name' => $fallos[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $t_cont = ['ACTIVO', 'PENDIENTE', 'ANULADO'];

        for ($i = 0; $i < count($t_cont); $i++) {
            DB::table('contract_statuses')->insert([
                'id' => $i + 1,
                'name' => $t_cont[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $t_cli = ['VISITA', 'VENDIDO', 'OTRO'];

        for ($i = 0; $i < count($t_cli); $i++) {
            DB::table('client_statuses')->insert([
                'id' => $i + 1,
                'name' => $t_cli[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $e_cont = ['NO ENTREGADO', 'VISUAL', 'ENTEL'];

        for ($i = 0; $i < count($e_cont); $i++) {
            DB::table('folder_statuses')->insert([
                'id' => $i + 1,
                'name' => $e_cont[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }
    }
}
