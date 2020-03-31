<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_reports', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('status', 20);
            $table->string('message', 100);
            $table->unsignedInteger('requestId');
            $table->string('processUrl');
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
        Schema::dropIfExists('control_reports');
    }
}
