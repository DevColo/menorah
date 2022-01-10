<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudenstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            //Student person Data
            $table->integer('user_id');
            $table->string('student_photo');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->string('Nationality');
            $table->string('address');
            $table->string('studentEmail');
            $table->string('phone');
            $table->string('cOfBirth');
            $table->string('city');
            $table->string('dOfBirth');
            $table->string('sex');
            // Student Family Data
            $table->string('fatherfullName');
            $table->string('father_living');
            $table->string('fatherOccupation');
            $table->string('father_nationality');
            $table->string('motherfullName');
            $table->string('mother_living');
            $table->string('mother_Occupation');
            $table->string('guardianContact');
            $table->string('Religion');
            $table->string('physical_defects');
            // previous School Data
            $table->string('previousSchoolName');
            $table->string('previousSchoolAddress');
            //active Student
            $table->integer('active');
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
        Schema::dropIfExists('students');
    }
}
