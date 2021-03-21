<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFnrcoFlatRedQuotationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnrco_flat_red_quotation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('visa_category_available')->nullable();
            $table->string('visa_category_arabic')->nullable();
            $table->string('quantity')->nullable();
            $table->string('nationality')->nullable();
            $table->string('salary')->nullable();
            $table->string('Food_allowance')->nullable();
            $table->string('Fnrco_charge')->nullable();
            $table->string('iqama_visa')->nullable();
            $table->string('admin_fees')->nullable();
            $table->string('value_per_employee_month')->nullable();
            $table->string('total_value_per_month')->nullable();
            $table->bigInteger('fnrco_flat_red_quotation_id')->unsigned();
            $table->foreign('fnrco_flat_red_quotation_id')->references('id')->on('fnrco_flat_red_quotations')->onDelete('cascade');
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
        Schema::dropIfExists('fnrco_flat_red_quotation_requests');
    }
}
