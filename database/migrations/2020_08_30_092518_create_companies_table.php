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
            $table->string('location')->nullable();
            $table->string('branch_number')->nullable();
            $table->integer('num_of_employees')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();


            $table->string('company_representative_name')->nullable();
            $table->string('company_representative_job_title')->nullable();
            $table->string('company_representative_job_mobile')->nullable();
            $table->string('company_representative_job_phone')->nullable();
            $table->string('company_representative_job_email')->nullable();


            $table->string('hr_director_job_name')->nullable();
            $table->string('hr_director_job_email')->nullable();
            $table->string('hr_director_job_mobile')->nullable();
            $table->string('hr_director_job_phone')->nullable();
            $table->string('hr_director_job_whatsapp')->nullable();

            $table->text('notes')->nullable();


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
