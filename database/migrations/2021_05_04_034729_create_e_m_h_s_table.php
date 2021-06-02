<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEMHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_m_h_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->string('create_date');
            $table->mediumText('description');
            $table->string('name');

            
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_m_h_s');
    }
}
