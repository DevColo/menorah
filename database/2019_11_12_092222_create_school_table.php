<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //'schoolName','address','school_id','logo','contact',
        Schema::create('school', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('schoolName');
             $table->string('schoolEmail')->uniqid();
            $table->string('address');
            $table->string('city/Town');
            $table->string('country');
            $table->string('logo');
            $table->string('school_id');
            $table->string('tnc');
            $table->integer('active');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school');
    }
}
