<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    // Muestra el formulario de matriculación
    public function create()
    {
        $alumnos = Alumno::all();
        $materias = Materia::where('cupo_maximo', '>', 0)->get();
        return view('matriculas.create', compact('alumnos', 'materias'));
    }

    // Procesa la matriculación de un alumno en una materia
    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'materia_id' => 'required|exists:materias,id',
        ]);

        $alumno = Alumno::find($request->alumno_id);
        $materia = Materia::find($request->materia_id);

        // Verificar que el alumno no esté ya matriculado en la materia
        if ($alumno->materias()->where('materia_id', $materia->id)->exists()) {
            return redirect()->back()->with('error', 'El alumno ya está matriculado en esta materia.');
        }

        // Verificar si hay cupo disponible
        if ($materia->cupo_maximo <= 0) {
            return redirect()->back()->with('error', 'No hay cupo disponible en esta materia.');
        }

        // Matricular al alumno y reducir el cupo
        $alumno->materias()->attach($materia->id);
        $materia->decrement('cupo_maximo');

        return redirect()->route('alumnos.index')->with('success', 'Alumno matriculado con éxito.');
    }

    // Desmatricula a un alumno de una materia
    public function destroy($alumnoId, $materiaId)
    {
        $alumno = Alumno::findOrFail($alumnoId);
        $materia = Materia::findOrFail($materiaId);

        if ($alumno->materias()->where('materia_id', $materia->id)->exists()) {
            $alumno->materias()->detach($materia->id);
            $materia->increment('cupo_maximo');
            return redirect()->back()->with('success', 'Materia desmatriculada con éxito.');
        }

        return redirect()->back()->with('error', 'El alumno no está matriculado en esta materia.');
    }
}
