<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('guide', 20)->unique();
            $table->bigInteger('pockets')->nullable();
            $table->bigInteger('pos')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('registered_by')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->timestamp('received_at');
            $table->timestamps();

            $table->foreign('registered_by')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('received_by')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
