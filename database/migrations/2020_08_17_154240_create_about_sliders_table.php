<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('imgpath');
            $table->string('heading1');
            $table->string('content1');
            $table->string('heading2');
            $table->string('content2');
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
        Schema::dropIfExists('about_sliders');
    }
}
