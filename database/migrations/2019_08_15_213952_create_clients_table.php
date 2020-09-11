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
            $table->string('negocio');
            $table->string('giro');
            $table->string('ruc')->nullable();

            $table->unsignedBigInteger('bank')->nullable();
            $table->foreign('bank')
                ->references('id')->on('banks')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_document')->default(1);
            $table->foreign('user_document')
                ->references('id')->on('client_documents')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('document')->unique();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('district')->nullable();
            $table->foreign('district')
                ->references('id')->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('regis_por')->nullable();
            $table->foreign('regis_por')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('vend_por')->nullable();
            $table->foreign('vend_por')
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
