<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('campus_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('student_code');
            $table->integer('active');

            //setting the foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campus_id')->references('id')->on('campus');
            $table->foreign('class_id')->references('id')->on('class');
            $table->foreign('student_id')->references('id')->on('students');



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
        Schema::dropIfExists('students_class');
    }
}
