<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultoriosTable extends Migration
{
    public function up()
    {
        Schema::create('consultorio', function (Blueprint $table) {
            $table->string('id_consultorio'); // Cambia a string o el tipo que necesites
            $table->string('ubicacion_consultorio');
            $table->integer('capacidad_consultorio');
            $table->integer('id_estatus');
            $table->integer('id_estatus_usuario');
            $table->timestamps(); // Esto añadirá los campos created_at y updated_at
            $table->primary('id_consultorio'); // Establecer el id_consultorio como clave primaria

            //llaveforaneo
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
            $table->foreign('id_estatus_usuario')->references('id_estatus_usuario')->on('estatus_usuario');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('consultorios');
    }
};
