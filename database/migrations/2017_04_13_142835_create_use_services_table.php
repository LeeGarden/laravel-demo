<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('use_services', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('id_service')->unsigned();
        //     $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
        //     $table->integer('id_admin')->unsigned();
        //     $table->foreign('id_admin')->references('id')->on('admins');
        //     $table->integer('id_bill')->unsigned();
        //     $table->foreign('id_bill')->references('id')->on('bills')->onDelete('cascade');
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
        //Schema::dropIfExists('use_services');
    }
}
