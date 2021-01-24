<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_agreements', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('agreement_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('cr')->nullable();
            $table->string('company_address_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail_box')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->nullable();
            $table->string('company_representative_en')->nullable();
            $table->string('company_representative_ar')->nullable();
            $table->string('duration_of_commitment')->nullable();
            $table->string('payment_of_fees')->nullable();
            $table->string('service_implementation_fee')->nullable();
            $table->string('the_notice_period')->nullable();
            $table->string('company_address_ar')->nullable();

            $table->integer('data_flow')->nullable();
            $table->string('healthcare_fee_ar')->nullable();
            $table->string('healthcare_visa_fee_ar')->nullable();

            $table->string('whitecollar_fee_ar')->nullable();
            $table->string('whitecollar_visa_fee_ar')->nullable();

            $table->string('bluecollar_fee_ar')->nullable();
            $table->string('bluecollar_visa_fee_ar')->nullable();

            $table->string('labor_fee_ar')->nullable();
            $table->string('labor_visa_fee_ar')->nullable();

            $table->string('referred_candidates_fee_ar')->nullable();
            $table->string('referred_candidates_visa_fee_ar')->nullable();

            $table->string('healthcare_fee_en')->nullable();
            $table->string('healthcare_visa_fee_en')->nullable();

            $table->string('whitecollar_fee_en')->nullable();
            $table->string('whitecollar_visa_fee_en')->nullable();

            $table->string('bluecollar_fee_en')->nullable();
            $table->string('bluecollar_visa_fee_en')->nullable();

            $table->string('labor_fee_en')->nullable();
            $table->string('labor_visa_fee_en')->nullable();

            $table->string('referred_candidates_fee_en')->nullable();
            $table->string('referred_candidates_visa_fee_en')->nullable();

            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('linrco_agreements');
    }
}
