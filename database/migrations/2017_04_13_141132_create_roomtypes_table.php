<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('roomtypes', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->string('typename');
            $table->integer('maxpeople')->unsigned();
            $table->double('price');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->timestamps();
            $table->text('image');
            $table->string('description');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roomtypes', function ($table) {
            $table->string('description');
        });
    }
}
