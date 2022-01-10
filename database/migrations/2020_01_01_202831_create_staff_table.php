<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //  Schema::create('staff_campus', function (Blueprint $table) {
       //      $table->increments('id');
       //      $table->integer('user_id')->unsigned();
       //    //  $table->integer('staff_id')->unsigned();
       //      $table->integer('campus_id')->unsigned();
       //      $table->integer('active')->default(1);
       //      $table->timestamps();
       //  });
       //  $table->foreign('user_id')->references('id')->on('users');
       // // $table->foreign('staff_id')->references('id')->on('staff');
       //  $table->foreign('campus_id')->references('id')->on('campus');



          Schema::create('staff_campus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->integer('campus_id')->unsigned();
            $table->integer('active')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('staff_id')->references('id')->on('staff');
             $table->foreign('campus_id')->references('id')->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_campus');
    }
}
