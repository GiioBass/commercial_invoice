<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentIntentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_intents', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('state');
            $table->unsignedInteger('number_intents');
            $table->timestamps();

           // $table->unsignedInteger('invoice_id');
            //$table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_intents');
    }
}
