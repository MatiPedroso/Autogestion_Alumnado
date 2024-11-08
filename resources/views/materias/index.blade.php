@extends('layouts.app')

@section('content')
    <h2>Listado de Materias</h2>

    <a href="{{ route('materias.create') }}" class="btn btn-primary mb-3">Nueva Materia</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Materia</th>
                <th>Cupo Máximo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nombre_materia }}</td>
                    <td>{{ $materia->cupo_maximo }}</td>
                    <td>
                        <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
