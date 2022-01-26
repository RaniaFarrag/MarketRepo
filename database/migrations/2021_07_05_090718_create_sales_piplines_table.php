<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPiplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_piplines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('company_user_id')->unsigned();
            $table->foreign('company_user_id')->references('id')->on('company_user')->onDelete('cascade');

            $table->bigInteger('mother_company_id')->unsigned()->nullable();
            $table->foreign('mother_company_id')->references('id')->on('mother_companies')->onDelete('cascade');

            $table->date('date')->nullable();
            $table->integer('total_volume')->nullable();
            $table->string('contract_type')->nullable();
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
        Schema::dropIfExists('sales_piplines');
    }
}
