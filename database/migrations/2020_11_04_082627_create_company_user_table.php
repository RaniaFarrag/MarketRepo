<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('mother_company_id')->unsigned()->nullable();
            $table->foreign('mother_company_id')->references('id')->on('mother_companies')->onDelete('cascade');

            $table->integer('client_status')->nullable();
            $table->integer('client_status_user_id')->nullable();

            $table->integer('evaluation_status')->nullable();
            $table->integer('evaluation_status_user_id')->nullable();

            $table->integer('confirm_connected')->nullable();
            $table->integer('confirm_connected_user_id')->nullable();

            $table->integer('confirm_interview')->nullable();
            $table->integer('confirm_interview_user_id')->nullable();

            $table->integer('confirm_need')->nullable();
            $table->integer('confirm_need_user_id')->nullable();

            $table->integer('confirm_contract')->nullable();
            $table->integer('confirm_contract_user_id')->nullable();

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
        Schema::dropIfExists('company_user');
    }
}
