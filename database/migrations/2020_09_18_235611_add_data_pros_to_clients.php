<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataProsToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('razon_social')->nullable();
            $table->string('ant_negocio')->nullable();
            $table->string('neg_department')->nullable();
            $table->string('neg_district')->nullable();
            $table->string('neg_province')->nullable();
            $table->string('neg_direccion')->nullable();
            $table->string('referencia')->nullable();
            $table->string('neg_correo')->nullable();
            $table->string('geo')->nullable();
            $table->enum('tipo_local', ['otro', 'alquilado'])->nullable();
            $table->date('fecha_ins')->nullable();
            $table->string('cli_department')->nullable();
            $table->string('cli_district')->nullable();
            $table->string('cli_province')->nullable();
            $table->string('cli_correo')->nullable();
            $table->date('fech_nac')->nullable();
            $table->date('fech_venc')->nullable();
            $table->enum('estado_civil', ['soltero', 'casado', 'viudo', 'divorciado'])->nullable();

            $table->string('cony_nom')->nullable();
            $table->string('cony_department')->nullable();
            $table->string('cony_district')->nullable();
            $table->string('cony_province')->nullable();
            $table->string('cony_direccion')->nullable();
            $table->string('cony_correo')->nullable();
            $table->string('cony_cellphone')->nullable();
            $table->string('cony_dni')->nullable();
            $table->date('cony_fech_nac')->nullable();
            $table->enum('cony_estado_civil', ['soltero', 'casado', 'viudo', 'divorciado'])->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
