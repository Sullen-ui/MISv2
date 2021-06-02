<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doctor')->nullable();
            $table->text('template');
            $table->string('name');
            $table->unsignedBigInteger('id_branch');

            $table->foreign('id_branch')->references('id')->on('branches')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('CASCADE')->onUpdate('CASCADE');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
