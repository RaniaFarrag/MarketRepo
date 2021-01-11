<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoUndertakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_undertakings', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('linrco_representative')->nullable();
            $table->string('linrco_cr')->nullable();
            $table->string('linrco_mail_box')->nullable();
            $table->string('company_representative')->nullable();
            $table->string('company_cr')->nullable();

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
        Schema::dropIfExists('linrco_undertakings');
    }
}
