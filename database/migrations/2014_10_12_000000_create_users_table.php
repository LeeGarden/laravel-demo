<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::table('bills', function (Blueprint $table) {
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('statuses');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         /*Schema::table('bills', function (Blueprint $table) {
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('statuses');
        });*/
    }   
}
