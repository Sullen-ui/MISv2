<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doctor');
            $table->mediumText('time');
            $table->integer('step');
            $table->unsignedBigInteger('id_branch');
            $table->integer('parity')->default(0);        //0 -без деления , 1 -нечет, 2 - чет

            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_branch')->references('id')->on('branches')->onDelete('CASCADE')->onUpdate('CASCADE');
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
}
