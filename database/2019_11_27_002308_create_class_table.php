<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //'user_id','school_id','campus_id','className','class_id'
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('className');
            $table->string('class_code');
            $table->integer('active');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('Cid')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
