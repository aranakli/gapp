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
        DB::statement(" CREATE OR REPLACE VIEW vwproyectomiembro AS
                            SELECT p.titulo AS Titulo, m.nombre AS Nombre, m.apellido AS apellido
                            FROM proyecto_miembros pm
                            JOIN proyectos p on p.id = pm.id_proyecto
                            JOIN miembros m on m.id = pm.id_miembro;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vwproyectomiembro;');
    }
};
