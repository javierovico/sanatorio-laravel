<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsperasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esperas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->time('fecha');
            $table->text('hora');
            $table->unsignedBigInteger('especialidad');
            $table->unsignedInteger('doctor');
            $table->unsignedBigInteger('sala');
            $table->foreign('especialidad')->references('id')->on('especialidades');
            $table->foreign('doctor')->references('cedula')->on('doctores');
            $table->foreign('sala')->references('id')->on('salas');
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
        Schema::dropIfExists('esperas');
    }
}
