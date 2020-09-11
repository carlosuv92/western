<?php

use Illuminate\Database\Seeder;

class TypeDocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = date("Y-m-d H:i:s");
        $name = ['DNI', 'RUC SIN NEGOCIO', 'RUC CON NEGOCIO','CE'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('type_documents')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $names = ['DNI','PASAPORTE','PTP','CEDULA'];

        for ($i = 0; $i < count($names); $i++) {
            DB::table('document_users')->insert([
                'id' => $i + 1,
                'name' => $names[$i],
                'description' => $names[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $names = ['ASISTIO','TARDANZA','FALTO','PERMISO'];

        for ($i = 0; $i < count($names); $i++) {
            DB::table('attendances')->insert([
                'id' => $i + 1,
                'name' => $names[$i],
                'description' => $names[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $names = ['ASIGNADA','ANULADA'];

        for ($i = 0; $i < count($names); $i++) {
            DB::table('type_guides')->insert([
                'id' => $i + 1,
                'name' => $names[$i],
                'description' => $names[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }
    }
}
