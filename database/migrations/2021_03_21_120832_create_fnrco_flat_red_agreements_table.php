<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFnrcoFlatRedAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnrco_flat_red_agreements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('flatred_quotation_id')->unsigned();
            $table->foreign('flatred_quotation_id')->references('id')->on('fnrco_flat_red_quotations')->onDelete('cascade');

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

            $table->string('mol')->nullable();
            $table->string('location')->nullable();
            $table->string('agreement_num')->nullable();
            $table->date('agreement_issue_date')->nullable();
            $table->date('agreement_expiry_date')->nullable();

            $table->string('work_hours')->nullable();
            $table->string('work_hours_ar')->nullable();

            $table->string('work_days')->nullable();
            $table->string('work_days_en')->nullable();

            $table->string('work_hours_weekly')->nullable();
            $table->string('work_hours_weekly_ar')->nullable();

            $table->string('contract_validity')->nullable();
            $table->string('contract_validity_ar')->nullable();
            $table->string('contract_validity_en')->nullable();

            $table->string('first_party')->nullable();
            $table->string('first_party_en')->nullable();
            $table->string('second_party')->nullable();
            $table->string('second_party_en')->nullable();
            $table->string('date')->nullable();

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
        Schema::dropIfExists('fnrco_flat_red_agreements');
    }
}
