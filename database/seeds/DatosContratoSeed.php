<?php

use Illuminate\Database\Seeder;

class DatosContratoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = date("Y-m-d H:i:s");
        $name = ['HUAWEI', 'GOSUNG','ZTE'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('brands')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['ALMACEN', 'ENTREGADO', 'CONTRATO' ,'DEVOLUCION','ROBADO', 'FALLA', 'DEVUELTO'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('type_router_fails')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['EFECTIVO', 'DA AMERICAN EXPRESS', 'DA DINNERS','DA MASTERCARD', 'DA VISA'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('payment_methods')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['VEP ESPECIAL', 'VEP REGULAR', 'VEP OUTDOOR',
                'VEP HOGAR','DEBITO AUTOMATICO'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('type_offers')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['INTERNET FIJO POWER 49',  'INTERNET FIJO POWER 69',
                 'INTERNET FIJO POWER 79', 'INTERNET FIJO POWER 89',
                 'INTERNET FIJO POWER 99', 'DUO FIJO POWER 59',
                 'DUO FIJO POWER 79',  'DUO FIJO POWER 89',
                 'DUO FIJO POWER 99',  'OUTDOOR 99'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('plan_offers')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['ACTIVO', 'PENDIENTE','ANULADO','EVIDENTE'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('contract_statuses')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }

        $name = ['NO ENTREGADO', 'VISUAL','ENTEL'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('folder_statuses')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'description' => $name[$i],
                'updated_at' => $current_date,
                'created_at' => $current_date,
            ]);
        }


    }
}
