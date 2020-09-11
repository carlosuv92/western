<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('status')->default(1);
            $table->foreign('status')
                ->references('id')->on('contract_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->unsignedBigInteger('type_service');
            $table->foreign('type_service')
                ->references('id')->on('type_services')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('back_office');
            $table->foreign('back_office')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('seller');
            $table->foreign('seller')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('supervisor_seller');
            $table->foreign('supervisor_seller')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('folder')->default(1);

            $table->foreign('folder')
                ->references('id')->on('folder_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')
                ->references('id')->on('departments')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->text('comment')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
