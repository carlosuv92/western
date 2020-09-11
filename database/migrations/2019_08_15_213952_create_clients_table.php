<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('status')->default(1);
            $table->foreign('status')
                ->references('id')->on('client_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name');

            $table->string('document')->unique();
            $table->unsignedBigInteger('user_document')->default(1);
            $table->foreign('user_document')
                ->references('id')->on('client_documents')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')
                ->references('id')->on('departments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('negocio');
            $table->string('giro');
            $table->string('ruc')->nullable();
            $table->string('phone')->nullable();


            $table->enum('priority', ['MUY INTERESADO', 'INTERESADO'])->nullable();


            $table->unsignedBigInteger('interesting');
            $table->foreign('interesting')
                ->references('id')->on('type_services')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('lead_by')->nullable();
            $table->foreign('lead_by')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('clients');
    }
}
