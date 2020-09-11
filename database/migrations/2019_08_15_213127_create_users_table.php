<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(false);
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('type_document')->default(1); //create_type_documents
            $table->foreign('type_document')->references('id')->on('type_documents')->onUpdate('cascade')->onDelete('cascade');
            $table->string('document')->nullable();

            $table->unsignedBigInteger('gender')->nullable();
            $table->foreign('gender')->references('id')->on('type_genders')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('civil')->nullable();
            $table->foreign('civil')->references('id')->on('type_civils')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('country')->nullable();
            $table->foreign('country')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('province')->nullable();
            $table->foreign('province')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('departament')->nullable();
            $table->foreign('departament')->references('id')->on('departaments')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('district')->nullable();
            $table->foreign('district')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
