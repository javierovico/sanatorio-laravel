<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores_especialidades', function (Blueprint $table) {
            $table->unsignedInteger('doctor');
            $table->unsignedBigInteger('especialidad');
            $table->primary(['doctor','especialidad']);
            $table->timestamps();
            $table->foreign('doctor')->references('cedula')->on('doctores');
            $table->foreign('especialidad')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores_especialidades');
    }
}
