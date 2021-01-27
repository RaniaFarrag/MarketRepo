<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinrcoInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linrco_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_no')->nullable();
            $table->date('date')->nullable();
            $table->integer('agreement_no')->nullable();
            $table->string('internal_contact')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();

            $table->text('file')->nullable();

            $table->bigInteger('linrco_agreement_id')->unsigned();
            $table->foreign('linrco_agreement_id')->references('id')->on('linrco_agreements')->onDelete('cascade');

            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

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
        Schema::dropIfExists('linrco_invoices');
    }
}
