<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id(); // Clave primaria auto-incremental
            $table->string('nombre'); // Nombre del proyecto
            $table->text('descripcion'); // Descripción del proyecto
            $table->date('fecha_inicio'); // Fecha de inicio del proyecto
            $table->date('fecha_fin')->nullable(); // Fecha de fin (puede ser nula si el proyecto aún no ha finalizado)
            $table->timestamps(); // Timestamps para crear y actualizar registros
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
