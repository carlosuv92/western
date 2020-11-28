<?php

use Illuminate\Database\Seeder;

class DepartmentActivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->whereIn('id',['14','15','8','13','23'])->update(['status' => 1]);
    }

}
