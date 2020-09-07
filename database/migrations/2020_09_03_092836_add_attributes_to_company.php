<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('client_status')->nullable()->after('hr_director_job_whatsapp');
            $table->integer('evaluation_status')->nullable()->after('client_status');
            $table->integer('evaluation_status_user_id')->nullable()->after('evaluation_status');

            $table->integer('confirm_connected')->nullable()->after('evaluation_status');
            $table->integer('confirm_connected_user_id')->nullable()->after('confirm_connected');

            $table->integer('confirm_interview')->nullable()->after('confirm_connected_user_id');
            $table->integer('confirm_interview_user_id')->nullable()->after('confirm_interview');

            $table->integer('confirm_need')->nullable()->after('confirm_interview_user_id');
            $table->integer('confirm_need_user_id')->nullable()->after('confirm_need');

            $table->integer('confirm_contract')->nullable()->after('confirm_need_user_id');
            $table->integer('confirm_contract_user_id')->nullable()->after('confirm_contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
