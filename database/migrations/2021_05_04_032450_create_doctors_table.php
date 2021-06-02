<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dob');
            $table->string('prof_name');
            $table->unsignedBigInteger('id_profession');
            $table->unsignedBigInteger('id_branch');
            $table->Integer('status');
            $table->string('cabinet');
            $table->unsignedBigInteger('id_user');
            $table->string('work_day')->default('1,2,3,4,5');

            $table->foreign('id_profession')->references('id')->on('professions')->onUpdate('CASCADE');
            $table->foreign('id_branch')->references('id')->on('branches')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
