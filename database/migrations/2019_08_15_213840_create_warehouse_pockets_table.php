<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousePocketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_pockets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('guide')->nullable();
            $table->string('reference', 10);
            $table->string('serie', 20)->unique();
            $table->unsignedBigInteger('brand')->nullable();
            $table->unsignedBigInteger('type')->nullable()->default(1);
            $table->unsignedBigInteger('assigned_by')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->string('guia_vico',20)->nullable();
            $table->timestamps();

            $table->foreign('assigned_by')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('assigned_to')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('guide')
                ->references('id')->on('warehouses')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('brand')
                ->references('id')->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type')
                ->references('id')->on('type_pos_fails')
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
        Schema::dropIfExists('warehouse_pockets');
    }
}
