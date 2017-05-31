<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomnumber');
            $table->integer('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->double('roomcharge');
            $table->double('servicecharge');
            $table->date('date_in');
            $table->date('date_out');
            $table->integer('id_roomtype')->unsigned();
            $table->foreign('id_roomtype')->references('id')->on('roomtypes');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->double('prepay');
            $table->timestamps();
        });*/
        // Schema::create('bills', function (Blueprint $table) {
        //     $table->integer('status');
        //     $table->foreign('status')->references('id')->on('statuses');
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
        //Schema::dropIfExists('bills');
    }
}
