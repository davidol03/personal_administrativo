<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaTable extends Migration
{
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->integer('id_cita')->primary();
            $table->dateTime('fecha_hora_cita');
            $table->integer('id_medico');
            $table->integer('id_consultorio');
            $table->timestamps(); // Para created_at y updated_at
            $table->integer('id_estatus');
            $table->integer('id_estatus_usuario');
            $table->integer('id_paciente');
            
            // Claves foráneas
            $table->foreign('id_medico')->references('id_medico')->on('medico');
            $table->foreign('id_consultorio')->references('id_consultorio')->on('consultorio');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
            $table->foreign('id_estatus_usuario')->references('id_estatus_usuario')->on('estatus_usuario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cita');
    }
}
