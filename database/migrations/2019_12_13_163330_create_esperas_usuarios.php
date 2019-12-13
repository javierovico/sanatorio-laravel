<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEsperasUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esperas_usuarios', function (Blueprint $table) {
            $table->unsignedInteger('usuario');
            $table->unsignedBigInteger('espera');
//            $table->integer('turno')->autoIncrement()->unique();
            $table->primary(['usuario','espera']);
            $table->foreign('usuario')->references('cedula')->on('usuarios');
            $table->foreign('espera')->references('id')->on('esperas');
            $table->timestamps();
        });
        DB::statement('ALTER Table esperas_usuarios add turno INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esperas_usuarios');
    }
}
