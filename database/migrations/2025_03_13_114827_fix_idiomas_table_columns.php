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
        Schema::table('idiomas', function (Blueprint $table) {
            // Primero eliminamos las columnas existentes
            $table->dropColumn(['nivel', 'titulo']);
        });

        Schema::table('idiomas', function (Blueprint $table) {
            // Recreamos las columnas con los tipos correctos
            $table->enum('nivel', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'])->after('idioma');
            $table->string('titulo', 100)->nullable()->after('nivel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('idiomas', function (Blueprint $table) {
            $table->dropColumn(['nivel', 'titulo']);
        });

        Schema::table('idiomas', function (Blueprint $table) {
            $table->enum('nivel', ['Alto', 'Medio', 'Básico']);
            $table->enum('titulo', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2']);
        });
    }
};
