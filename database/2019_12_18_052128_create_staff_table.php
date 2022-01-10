<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            //
            $table->string('staff_code');
            $table->string('staff_photo');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('dofBirth');
            $table->string('Address');
            $table->string('city/Town');
            $table->string('Nationality');
            $table->string('country');
            $table->string('sex');
            $table->string('marriageStatus');
            $table->string('employmentDate');
            $table->string('Religion');
            $table->string('physicalDefect');
            $table->string('active');
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
        Schema::dropIfExists('staff');
    }
}
