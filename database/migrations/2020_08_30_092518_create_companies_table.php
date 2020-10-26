<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('first_business_card')->nullable();
            $table->string('second_business_card')->nullable();
            $table->string('third_business_card')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('sector_id')->unsigned()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->bigInteger('sub_sector_id')->unsigned()->nullable();
            $table->foreign('sub_sector_id')->references('id')->on('sub_sectors')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('district')->nullable();
            $table->text('location')->nullable();
            $table->string('branch_number')->nullable();
            $table->integer('num_of_employees')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();

            $table->string('ecn')->nullable();
            $table->string('cr')->nullable();
            $table->string('ksa_branch')->nullable();


            $table->string('company_representative_name')->nullable();
            $table->string('company_representative_title')->nullable();
            $table->string('company_representative_mobile')->nullable();
            $table->string('company_representative_phone')->nullable();
            $table->string('company_representative_email')->nullable();


            $table->string('hr_director_name')->nullable();
            $table->string('hr_director_email')->nullable();
            $table->string('hr_director_mobile')->nullable();
            $table->string('hr_director_phone')->nullable();
            $table->string('hr_director_whatsapp')->nullable();
            $table->string('hr_director_linkedin')->nullable();

            $table->string('contract_manager_name')->nullable();
            $table->string('contract_manager_email')->nullable();
            $table->string('contract_manager_mobile')->nullable();
            $table->string('contract_manager_phone')->nullable();
            $table->string('contract_manager_whatsapp')->nullable();
            $table->string('contract_manager_linkedin')->nullable();

            $table->text('notes')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('companies');
    }
}
