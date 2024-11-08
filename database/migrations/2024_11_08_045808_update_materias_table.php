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
        Schema::table('materias', function (Blueprint $table) {
            // Renombrar 'nombre_materia' a 'nombre' solo si existe
            if (Schema::hasColumn('materias', 'nombre_materia')) {
                $table->renameColumn('nombre_materia', 'nombre');
            }

            // Renombrar 'cupo_maximo' a 'cupo' solo si existe
            if (Schema::hasColumn('materias', 'cupo_maximo')) {
                $table->renameColumn('cupo_maximo', 'cupo');
            }

            // Agregar la columna 'descripcion' al final, sin especificar una posición
            if (!Schema::hasColumn('materias', 'descripcion')) {
                $table->text('descripcion')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            // Revertir los cambios hechos en la tabla
            if (Schema::hasColumn('materias', 'nombre')) {
                $table->renameColumn('nombre', 'nombre_materia');
            }

            if (Schema::hasColumn('materias', 'cupo')) {
                $table->renameColumn('cupo', 'cupo_maximo');
            }

            if (Schema::hasColumn('materias', 'descripcion')) {
                $table->dropColumn('descripcion');
            }
        });
    }
};
