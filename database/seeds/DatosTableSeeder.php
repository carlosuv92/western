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

        $name = ['PENDIENTE', 'INGRESADO', 'ACTIVO', 'ANULADO'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('contract_statuses')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }


        $e_cont = ['NO ENTREGADO', 'VISUAL', 'ENTREGADO'];

        for ($i = 0; $i < count($e_cont); $i++) {
            DB::table('folder_statuses')->insert([
                'id' => $i + 1,
                'name' => $e_cont[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $department = ['LIMA','TRUJILLO', 'CHIMBOTE','CHICLAYO','ICA'];

        for ($i = 0; $i < count($department); $i++) {
            DB::table('departments')->insert([
                'id' => $i + 1,
                'name' => $department[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $cl_status = ['PROSPECTO', 'CLIENTE'];

        for ($i = 0; $i < count($cl_status); $i++) {
            DB::table('client_statuses')->insert([
                'id' => $i + 1,
                'name' => $cl_status[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $type_services = ['SERVICIOS', 'REMESAS', 'AMBOS'];

        for ($i = 0; $i < count($type_services); $i++) {
            DB::table('type_services')->insert([
                'id' => $i + 1,
                'name' => $type_services[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }
    }
}
