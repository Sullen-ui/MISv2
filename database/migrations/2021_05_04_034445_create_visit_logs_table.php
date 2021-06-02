<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('uid'); // id врача + время (timestamp)
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->string('visit_date');
            $table->unsignedBigInteger('id_branch');
            $table->integer('status')->default(0); // явка/нет

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onUpdate('CASCADE');
            $table->foreign('id_branch')->references('id')->on('branches')->onUpdate('CASCADE');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_logs');
    }
}
