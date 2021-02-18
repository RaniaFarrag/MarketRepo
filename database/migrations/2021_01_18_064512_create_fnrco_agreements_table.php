<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFnrcoAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnrco_agreements', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('fnrco_quotation_id')->unsigned();
            $table->foreign('fnrco_quotation_id')->references('id')->on('fnrco_quotations')->onDelete('cascade');

            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->date('cr_date')->nullable();
            $table->string('hr_system')->nullable();
            $table->string('signing_by')->nullable();
            $table->string('by_as')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('postal_code')->nullable();

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
        Schema::dropIfExists('fnrco_agreements');
    }
}
