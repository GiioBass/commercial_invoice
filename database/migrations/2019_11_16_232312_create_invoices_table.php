<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->string('state');
            $table->date('expedition_date');
            $table->date('expiration_date');
            $table->double('iva');
            $table->double('total');
            $table->timestamps();
            
            $table->unsignedInteger('sellers_id');
            $table->unsignedInteger('clients_id');
            $table->foreign('sellers_id')->references('id')->on('sellers');
            $table->foreign('clients_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
