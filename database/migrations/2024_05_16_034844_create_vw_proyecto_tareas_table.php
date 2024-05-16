<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(" CREATE OR REPLACE VIEW vwproyectotareas AS
                        SELECT p.id AS proyecto, p.titulo AS titulo , t.*
                        FROM proyectos p
                        JOIN tareas t ON p.id = t.id_proyecto
                        ORDER BY id_proyecto
                        AND fecha_inicio
                        AND fecha_fin_real;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vw_proyecto_tarea');
    }
};
