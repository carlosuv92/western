<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->text('estado_doc')->nullable();
            $table->text('comment_first')->nullable();
            $table->date('fecha_kia')->nullable();
            $table->date('fecha_env_cli')->nullable();
            $table->date('fecha_firm_cli')->nullable();
            $table->string('id_company')->nullable();
            $table->string('ant_negocio')->nullable();
            $table->date('fecha_inscr')->nullable();
            $table->string('cod_postal')->nullable();

            $table->text('estado')->nullable();
            $table->date('fecha_estado')->nullable();
            $table->text('comment_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            //
        });
    }
}
