<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConyugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conyuges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('client')->default(1);
            $table->foreign('client')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');

            $table->string('document')->unique();
            $table->unsignedBigInteger('user_document')->default(1);
            $table->foreign('user_document')->references('id')->on('client_documents')->onUpdate('cascade')->onDelete('cascade');

            $table->string('department')->nullable();
            $table->foreign('department')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');

            $table->string('province')->nullable();
            $table->foreign('province')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');

            $table->string('district')->nullable();
            $table->foreign('district')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');

            $table->string('address');
            $table->string('email');
            $table->string('cellphone');
            $table->date('dob');
            $table->enum('status_civil', ['soltero', 'casado', 'viudo', 'divorciado']);

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
        Schema::dropIfExists('conyuges');
    }
}
