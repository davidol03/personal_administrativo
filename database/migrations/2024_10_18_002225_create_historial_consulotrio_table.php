<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialConsultoriosTable extends Migration
{
    public function up()
    {
        Schema::create('historial_consultorio', function (Blueprint $table) {
            $table->string('id_historial'); // Tipo string, puedes cambiar si necesitas otro tipo de dato
            $table->string('id_consultorio'); // Relación con consultorio
            $table->string('id_medico'); // Relación con medico
            $table->dateTime('fecha_uso');
            $table->timestamps(); // Para created_at y updated_at
            $table->integer('id_estatus');
            $table->integer('id_estatus_usuario');
            
            // Establecer la clave primaria
            $table->primary('id_historial');

            // Definir las llaves foráneas
            $table->foreign('id_consultorio')->references('id_consultorio')->on('consultorio');
            $table->foreign('id_medico')->references('id_medico')->on('medico');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
            $table->foreign('id_estatus_usuario')->references('id_estatus_usuario')->on('estatus_usuario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_consultorios');
    }
};
