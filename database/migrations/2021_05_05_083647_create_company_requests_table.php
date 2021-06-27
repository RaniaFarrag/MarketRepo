<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('company_user_id')->unsigned();
            $table->foreign('company_user_id')->references('id')->on('company_user')->onDelete('cascade');

            $table->bigInteger('mother_company_id')->unsigned()->nullable();
            $table->foreign('mother_company_id')->references('id')->on('mother_companies')->onDelete('cascade');

            $table->string('request_type')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('date')->nullable();
            $table->string('request_status')->nullable();
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
        Schema::dropIfExists('company_requests');
    }
}
