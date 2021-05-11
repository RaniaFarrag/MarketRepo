<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_request_id')->unsigned();
            $table->foreign('company_request_id')->references('id')->on('company_requests')->onDelete('cascade');
            $table->string('feedback')->nullable();
            $table->string('note')->nullable();
            $table->date('next_follow_date')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
