@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Editar Alumno: {{ $alumno->nombre }} {{ $alumno->apellido }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $alumno->apellido) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $alumno->edad) }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Actualizar Alumno</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Materias Matriculadas</h5>
                    </div>
                    <div class="card-body">
                        @if($materiasMatriculadas->isEmpty())
                            <p class="text-muted">Este alumno no está matriculado en ninguna materia.</p>
                        @else
                            <ul class="list-group">
                                @foreach($materiasMatriculadas as $materia)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $materia->nombre_materia }}
                                        <form action="{{ route('matriculas.destroy', ['alumnoId' => $alumno->id, 'materiaId' => $materia->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Desmatricular</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver a la lista de Alumnos</a>
                </div>
            </div>
        </div>
    </div>
@endsection
