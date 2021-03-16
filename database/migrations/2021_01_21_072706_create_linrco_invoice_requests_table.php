<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoInvoiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_invoice_requests', function (Blueprint $table) {
            $table->id();

            $table->string('particulars')->nullable();
            $table->string('recruitment_fee')->nullable();
            $table->string('visa_processing_fee')->nullable();
            $table->string('total_before_tax')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_amount_after_tax')->nullable();

            $table->bigInteger('linrco_invoice_id')->unsigned();
            $table->foreign('linrco_invoice_id')->references('id')->on('linrco_invoices')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linrco_invoice_requests');
    }
}
