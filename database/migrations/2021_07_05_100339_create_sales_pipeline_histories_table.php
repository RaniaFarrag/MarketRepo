<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPipelineHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_pipeline_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_pipeline_id')->unsigned();
            $table->foreign('sales_pipeline_id')->references('id')->on('sales_piplines')->onDelete('cascade');

            $table->date('date')->nullable();
            $table->integer('total_volume')->nullable();
            $table->string('forecast')->nullable();
            $table->text('comments')->nullable();
            $table->string('project_closing_month')->nullable();
            $table->string('project_closing_year')->nullable();

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
        Schema::dropIfExists('sales_pipeline_histories');
    }
}
