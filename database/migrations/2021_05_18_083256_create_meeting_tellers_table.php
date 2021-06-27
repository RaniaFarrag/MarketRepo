<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingTellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_tellers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('representative_id')->unsigned()->nullable();
            $table->foreign('representative_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('mother_company_id')->unsigned()->nullable();
            $table->foreign('mother_company_id')->references('id')->on('mother_companies')->onDelete('cascade');

            $table->date('date_call')->nullable();
            $table->time('time_call')->nullable();
            $table->text('feedback')->nullable();
            $table->date('date_meeting')->nullable();
            $table->time('time_meeting')->nullable();
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
        Schema::dropIfExists('meeting_tellers');
    }
}
