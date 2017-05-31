<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rooms', function (Blueprint $table) {
        //     $table->integer('roomnumber');
        //     $table->primary('roomnumber');
        //     $table->integer('id_roomtype')->unsigned();
        //     $table->foreign('id_roomtype')->references('id')->on('roomtypes')->onDelete('cascade');
        //     $table->integer('id_admin')->unsigned();
        //     $table->foreign('id_admin')->references('id')->on('admins');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('rooms');
    }
}
