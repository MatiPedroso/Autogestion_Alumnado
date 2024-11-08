<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    // Mostrar todas las materias
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    // Mostrar el formulario de creación de materia
    public function create()
    {
        return view('materias.create');
    }

    // Almacenar una nueva materia
    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'cupo_maximo' => 'required|integer|min:1',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente');
    }

    // Mostrar el formulario de edición de materia
    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    // Actualizar una materia existente
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'cupo_maximo' => 'required|integer|min:1',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente');
    }

    // Eliminar una materia
    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente');
    }
}

