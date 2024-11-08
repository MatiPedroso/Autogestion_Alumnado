@extends('layouts.app')

@section('content')
    <h2>Detalles del Alumno: {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>

    <h3>Materias Matriculadas</h3>
    <ul>
        @foreach($alumno->materias as $materia)
            <li>{{ $materia->nombre_materia }} (Cupo restante: {{ $materia->cupo_maximo }})</li>
        @endforeach
    </ul>
@endsection
