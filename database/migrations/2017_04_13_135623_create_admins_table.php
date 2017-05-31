<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->boolean('gender');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('roles');
            $table->string('password');
            $table->timestamps();
            $table->text('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('admins');
        
    }
}
