<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFnrcoFlatRedAgreementAnnexuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnrco_flat_red_agreement_annexures', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('flatred_agreement_id')->unsigned();
            $table->foreign('flatred_agreement_id')->references('id')->on('fnrco_flat_red_agreements')->onDelete('cascade');

            $table->text('notes')->nullable();
            $table->text('general_terms')->nullable();
            $table->text('recruitment_procedure')->nullable();
            $table->text('post_recruiment_procedure')->nullable();
            $table->text('payment_default')->nullable();

//            $table->string('first_address')->nullable();
//            $table->string('first_location')->nullable();
//            $table->string('first_project_representative_name')->nullable();
//            $table->string('first_project_representative_designation')->nullable();
//            $table->string('first_project_representative_contact_num')->nullable();
//            $table->string('first_project_representative_email')->nullable();
//
//            $table->string('first_account_representative_name')->nullable();
//            $table->string('first_account_representative_designation')->nullable();
//            $table->string('first_account_representative_contact_num')->nullable();
//            $table->string('first_account_representative_email')->nullable();
//
//            $table->string('first_bank_name_beneficiary')->nullable();
//            $table->string('first_bank_name')->nullable();
//            $table->string('first_bank_branch')->nullable();
//            $table->string('first_bank_type_account')->nullable();
//            $table->string('first_bank_account_num')->nullable();
//            $table->string('first_bank_iban_num')->nullable();

            $table->string('second_address')->nullable();
            $table->string('second_location')->nullable();
            $table->string('second_project_representative_name')->nullable();
            $table->string('second_project_representative_designation')->nullable();
            $table->string('second_project_representative_contact_num')->nullable();
            $table->string('second_project_representative_email')->nullable();

            $table->string('second_account_representative_name')->nullable();
            $table->string('second_account_representative_designation')->nullable();
            $table->string('second_account_representative_contact_num')->nullable();
            $table->string('second_account_representative_email')->nullable();

            $table->string('second_bank_name_beneficiary')->nullable();
            $table->string('second_bank_name')->nullable();
            $table->string('second_bank_branch')->nullable();
            $table->string('second_bank_type_account')->nullable();
            $table->string('second_bank_account_num')->nullable();
            $table->string('second_bank_iban_num')->nullable();

            $table->string('hr_name')->nullable();
            $table->string('hr_designation')->nullable();

            $table->string('finance_name')->nullable();
            $table->string('finance_designation')->nullable();

            $table->string('approved_by_name')->nullable();
            $table->string('approved_by_designation')->nullable();

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
        Schema::dropIfExists('fnrco_flat_red_agreement_annexures');
    }
}
