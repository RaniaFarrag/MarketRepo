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
            $table->bigInteger('teller_id')->unsigned();
            $table->foreign('teller_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('feedback')->nullable();
            $table->text('note')->nullable();
            $table->date('date')->nullable();
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
