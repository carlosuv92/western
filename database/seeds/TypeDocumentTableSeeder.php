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

        $t_doc = ['DNI', 'PASAPORTE', 'PTP', 'CEDULA', 'OTRO'];

        for ($i = 0; $i < count($t_doc); $i++) {
            DB::table('type_documents')->insert([
                'id' => $i + 1,
                'name' => $t_doc[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $c_doc = ['DNI'];

        for ($i = 0; $i < count($c_doc); $i++) {
            DB::table('client_documents')->insert([
                'id' => $i + 1,
                'name' => $c_doc[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }
    }
}
