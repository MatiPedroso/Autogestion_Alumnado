<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculaController;

// Ruta principal que dirige al índice de alumnos
Route::get('/', function () {
    return redirect()->route('alumnos.index');
});

// Rutas CRUD para Alumnos
Route::resource('alumnos', AlumnoController::class);

// Rutas CRUD para Materias
Route::resource('materias', MateriaController::class);

// Rutas para la matriculación
Route::get('matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
Route::delete('matriculas/{alumnoId}/{materiaId}', [MatriculaController::class, 'destroy'])->name('matriculas.destroy');
