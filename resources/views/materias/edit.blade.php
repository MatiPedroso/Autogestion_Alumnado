@extends('layouts.app')

@section('content')
    <h2>Editar Materia</h2>

    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre_materia" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" value="{{ $materia->nombre_materia }}" required>
        </div>

        <div class="mb-3">
            <label for="cupo_maximo" class="form-label">Cupo Máximo</label>
            <input type="number" class="form-control" id="cupo_maximo" name="cupo_maximo" value="{{ $materia->cupo_maximo }}" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Materia</button>
    </form>
@endsection
