<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoQuotationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_quotation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('trade')->nullable();
            $table->integer('gender')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('quantity')->nullable();
            $table->string('nationality')->nullable();
            $table->string('salary')->nullable();
            $table->string('RECRUITMENT_CHARGES_PER_CANDIDATE')->nullable();
            $table->string('VISA_PROCESSING_CHARGES_PER_CANDIDATE')->nullable();
            $table->string('other_allowance')->nullable();
            $table->bigInteger('linrco_quotation_id')->unsigned();
            $table->foreign('linrco_quotation_id')->references('id')->on('linrco_quotations')->onDelete('cascade');
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
        Schema::dropIfExists('linrco_quotation_requests');
    }
}
