<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('polis_num')->nullable();
            $table->string('polis_comp')->nullable();
            $table->unsignedBigInteger('polis_type')->comment('ОМС (единого образца), временный ОМС, старого ОМС, ДМС')->nullable();
            $table->string('pasport_num')->nullable();
            $table->string('pasport_serial')->nullable();
            $table->string('pasport_who')->nullable();
            $table->string('pasport_date')->nullable();
            $table->string('snils')->nullable();
            $table->string('gender');
            $table->string('work_place')->nullable();
            $table->string('dob');
            $table->string('dob_place')->nullable();
            $table->string('registration')->nullable();
            $table->string('phone')->nullable();
            $table->integer('resident')->default(0); // 0-местные\ 1 - нет
            $table->integer('soc_status')->nullable(); // Рабочий, не рабочий, пенсионер, инвалид,транспортник(ЖД),пенсионер(транспортник), учащийся, студень
            $table->integer('invalid')->nullable(); // 0 - нет, 1,2,3 - группы
            
            $table->foreign('polis_type')->references('id')->on('polis')->onDelete('CASCADE')->onUpdate('CASCADE');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
