<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoombookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roombookings', function (Blueprint $table) {
            $table->id();
            $table->string('room_type');
            $table->integer('children');
            $table->integer('adults');
            $table->integer('no_of_rooms');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('email');
            $table->integer('number');
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
        Schema::dropIfExists('roombookings');
    }
}
