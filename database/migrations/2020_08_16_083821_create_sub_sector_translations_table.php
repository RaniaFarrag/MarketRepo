<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSectorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sector_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_sector_id')->unsigned();
            $table->foreign('sub_sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
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
        Schema::dropIfExists('sub_sector_translations');
    }
}
