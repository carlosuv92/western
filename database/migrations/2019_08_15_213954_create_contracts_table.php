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

            $table->unsignedBigInteger('sales_manager');
            $table->foreign('sales_manager')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('brand')->nullable();
            $table->foreign('brand')
                ->references('id')->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('modelpocket')->nullable();
            $table->foreign('modelpocket')
                ->references('id')->on('model_pockets')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('serie')->nullable();
            $table->string('orden')->nullable();
            $table->string('precio')->nullable();  //Cambiar
            $table->string('pagado')->nullable();
            $table->string('num_voucher')->nullable();
            $table->string('voucher_1')->nullable();
            $table->string('voucher_2')->nullable();
            $table->unsignedBigInteger('folder')->default(1);

            $table->foreign('folder')
                ->references('id')->on('folder_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->unsignedBigInteger('folder_sup')->default(1);

            $table->foreign('folder_sup')
                ->references('id')->on('folder_statuses')
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
