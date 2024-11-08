<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
        ]);

        $ultimoAlumno = Alumno::latest()->first();
        $nuevoIdAlumno = 'ALU-' . str_pad(($ultimoAlumno ? substr($ultimoAlumno->id_alumno, 4) : 0) + 1, 4, '0', STR_PAD_LEFT);

        Alumno::create([
            'id_alumno' => $nuevoIdAlumno,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno registrado con éxito.');
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $materiasMatriculadas = $alumno->materias;
        return view('alumnos.edit', compact('alumno', 'materiasMatriculadas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->only(['nombre', 'apellido', 'edad']));

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado con éxito.');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado con éxito.');
    }
}
