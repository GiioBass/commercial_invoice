<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->string('first_name', 40);
            $table->string('last_name', 40);
            $table->string('user_name', 40);
            $table->string('password', 40);
            $table->timestamps();

            $table->unsignedInteger('permit_id');
            $table->foreign('permit_id')->references('id')->on('permits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
