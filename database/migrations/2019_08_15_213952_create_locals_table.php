<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client')->default(1);
            $table->foreign('client')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ruc');
            $table->string('name');
            $table->string('socname');
            $table->string('ant_negocio');
            $table->string('giro');

            $table->string('department')->nullable();
            $table->foreign('department')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');

            $table->string('province')->nullable();
            $table->foreign('province')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');

            $table->string('district')->nullable();
            $table->foreign('district')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');


            $table->string('address');
            $table->text('reference');
            $table->string('phone');
            $table->string('email');
            $table->string('geo');
            $table->enum('type_local', ['propio', 'alquilado'])->nullable();
            $table->date('inscription');
            $table->string('postal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
