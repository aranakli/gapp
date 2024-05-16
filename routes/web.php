<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoMiembroController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ProyectoTareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Rutas de miembro
    Route::get('/miembro', [MiembroController::class, 'index'])->name('miembro.index');
    Route::post('/miembro', [MiembroController::class, 'store'])->name('miembro.store');
    Route::get('/miembro/create', [MiembroController::class, 'create'])->name('miembro.create');
    Route::delete('/miembro/{miembros}', [MiembroController::class, 'destroy'])->name('miembro.destroy');
    Route::put('/miembro/{miembros}', [MiembroController::class, 'update'])->name('miembro.update');
    Route::get('/miembro/{miembros}/edit', [MiembroController::class, 'edit'])->name('miembro.edit');
    // Rutas de proyectos
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
    Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
    Route::delete('/proyectos/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
    Route::put('/proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::get('/proyectos/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
    // Rutas de proyecto miembro
    Route::get('/proyecto_miembros', [ProyectoMiembroController::class, 'index'])->name('proyecto_miembros.index');
    Route::post('/proyecto_miembros', [ProyectoMiembroController::class, 'store'])->name('proyecto_miembros.store');
    Route::get('/proyecto_miembros/create', [ProyectoMiembroController::class, 'create'])->name('proyecto_miembros.create');
    Route::delete('/proyecto_miembros/{proyecto_miembro}', [ProyectoMiembroController::class, 'destroy'])->name('proyecto_miembros.destroy');
    Route::put('/proyecto_miembros/{proyecto_miembro}', [ProyectoMiembroController::class, 'update'])->name('proyecto_miembros.update');
    Route::get('/proyecto_miembros/{proyecto_miembro}/edit', [ProyectoMiembroController::class, 'edit'])->name('proyecto_miembros.edit');
    // Rutas de tareas
    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
    Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    Route::put('/tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::get('/tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    // Rutas de proyecto_tarea
    Route::get('/proyecto_tareas', [ProyectoTareaController::class, 'index'])->name('proyecto_tareas.index');
    Route::post('/proyecto_tareas', [ProyectoTareaController::class, 'store'])->name('proyecto_tareas.store');
    Route::get('/proyecto_tareas/create', [ProyectoTareaController::class, 'create'])->name('proyecto_tareas.create');
    Route::delete('/proyecto_tareas/{proyecto_tarea}', [ProyectoTareaController::class, 'destroy'])->name('proyecto_tareas.destroy');
    Route::put('/proyecto_tareas/{proyecto_tarea}', [ProyectoTareaController::class, 'update'])->name('proyecto_tareas.update');
    Route::get('/proyecto_tareas/{proyecto_tarea}/edit', [ProyectoTareaController::class, 'edit'])->name('proyecto_tareas.edit');
});

require __DIR__ . '/auth.php';
