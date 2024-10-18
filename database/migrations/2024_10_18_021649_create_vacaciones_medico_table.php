<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones_medico', function (Blueprint $table) {
            $table->integer('id_vacacion')->primary();
            $table->integer('id_medico')->nullable(); // Puede ser nulo si no está asociado a un médico
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('motivo_vacacion', 255)->nullable(); // Puede ser nulo si no se especifica un motivo
            $table->timestamps(); // Para created_at y updated_at
            $table->integer('id_estatus')->nullable();
            $table->integer('id_estatus_usuario')->nullable();

            // Definición de claves foráneas
            $table->foreign('id_medico')->references('id_medico')->on('medico')->onDelete('set null');
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
        Schema::dropIfExists('vacaciones_medico');
    }
}
