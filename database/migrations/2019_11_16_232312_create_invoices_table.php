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
            
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('client_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('client_id')->references('id')->on('clients');
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
