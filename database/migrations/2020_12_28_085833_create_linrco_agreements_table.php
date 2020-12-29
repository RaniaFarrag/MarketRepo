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
            $table->string('company_name')->nullable();
            $table->string('cr')->nullable();
            $table->string('company_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail_box')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->nullable();
            $table->string('company_representative')->nullable();
            $table->string('position')->nullable();
            $table->string('duration_of_commitment')->nullable();
            $table->string('payment_of_fees')->nullable();
            $table->string('service_implementation_fee')->nullable();
            $table->string('the_notice_period')->nullable();
            $table->string('linrco_email')->nullable();
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
