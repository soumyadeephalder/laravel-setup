<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details_titel');
            $table->string('details_text');
            $table->string('details_img');
            $table->string('details_video');
            $table->string('course');
            $table->string('subject');
            $table->string('chapter');
            $table->string('type');
            $table->string('status');
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
        Schema::dropIfExists('chapter_details');
    }
}
