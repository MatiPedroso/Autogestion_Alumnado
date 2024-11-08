@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Alumnos</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Registrar Alumno</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Alumno</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Materias Inscritas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id_alumno }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>
                            <!-- Mostrar las materias inscritas -->
                            @foreach ($alumno->materias as $materia)
                                <span class="badge bg-info">{{ $materia->nombre_materia }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
