<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_medico', function (Blueprint $table) {
            $table->integer('id_equipomedico')->primary();
            $table->string('nombre_equipo', 100);
            $table->string('descripcion', 100);
            $table->date('fecha_uso');
            $table->timestamps(); // Para created_at y updated_at
            $table->integer('id_estatus')->nullable();
            $table->integer('id_estatus_usuario')->nullable();

            // Definición de claves foráneas
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus')->onDelete('set null');
            $table->foreign('id_estatus_usuario')->references('id_estatus_usuario')->on('estatus_usuario')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_medico');
    }
}
