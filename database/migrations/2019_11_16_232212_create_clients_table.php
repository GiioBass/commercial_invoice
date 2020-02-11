<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedInteger('id', 12)->unique();
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('phone_number', 30);
            $table->string('email', 80)->unique();
            $table->string('address', 100);
            $table->timestamps();

            $table->integer('document_type_id');
            $table->foreign('document_type_id')->references('id')->on('document_types');
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
