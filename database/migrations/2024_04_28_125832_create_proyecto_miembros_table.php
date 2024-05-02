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
        Schema::create('proyecto_miembros', function (Blueprint $table) {
            $table->unsignedBigInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            $table->unsignedBigInteger('id_miembro');
            $table->foreign('id_miembro')->references('id')->on('miembros');
            $table->primary(['id_proyecto', 'id_miembro']);
            $table->string('rol');
            $table->string('areaAsignada');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_miembros');
    }
};
