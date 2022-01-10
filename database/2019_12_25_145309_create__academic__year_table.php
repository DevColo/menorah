<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearbook', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->date('startdate');
            $table->date('enddate');
            $table->integer('user_id')->unsigned();
            $table->integer('active')->default(1);
 
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('yearbook');
    }
}
