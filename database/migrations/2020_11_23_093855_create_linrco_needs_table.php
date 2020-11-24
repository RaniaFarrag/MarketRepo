<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_needs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employment_type_id')->unsigned();
            $table->foreign('employment_type_id')->references('id')->on('employment_types')->onDelete('cascade');
            $table->string('required_position')->nullable();
            $table->text('job_description')->nullable();
            $table->string('candidates_number')->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('gender');
            $table->string('minimum_age')->nullable();
            $table->string('total_salary')->nullable();
            $table->string('special_note')->nullable();

            $table->string('contract_duration')->nullable();
            $table->string('experience_range')->nullable();
            $table->string('work_location')->nullable();
            $table->string('work_hours')->nullable();
            $table->string('deadline')->nullable();

            $table->string('educational_qualification')->nullable();
            $table->integer('data_flow')->nullable();
            $table->integer('prometric')->nullable();
            $table->string('classification')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('area_of_experience')->nullable();
            $table->string('other_skills')->nullable();

            $table->bigInteger('company_id');

//            $table->bigInteger('sector_id')->unsigned()->nullable();
//            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('linrco_needs');
    }
}
