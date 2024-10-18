<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadTable extends Migration
{
    public function up()
    {
        Schema::create('especialidad', function (Blueprint $table) {
            $table->integer('id_especialidad')->primary();
            $table->string('nombre_especialidad', 100);
            $table->string('descripcion', 100)->nullable();
            $table->timestamps(); // created_at y updated_at
            $table->integer('id_estatus');
            $table->integer('id_estatus_usuario');

            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
            $table->foreign('id_estatus_usuario')->references('id_estatus_usuario')->on('estatus_usuario');

    
        });
    }

    public function down()
    {
        Schema::dropIfExists('especialidad');
    }
}
