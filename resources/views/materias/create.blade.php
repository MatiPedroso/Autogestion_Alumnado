@extends('layouts.app')

@section('content')
    <h2>Crear Nueva Materia</h2>

    <form action="{{ route('materias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_materia" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>
        </div>

        <div class="mb-3">
            <label for="cupo_maximo" class="form-label">Cupo Máximo</label>
            <input type="number" class="form-control" id="cupo_maximo" name="cupo_maximo" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Materia</button>
    </form>
@endsection
