<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlReportInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_report_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

           $table->unsignedInteger('control_report_id');
           $table->unsignedInteger('invoice_id');
           $table->foreign('control_report_id')->references('id')->on('control_reports');
           $table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_report_invoices');
    }
}
