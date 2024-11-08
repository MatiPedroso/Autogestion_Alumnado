@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Matricular Alumno en Materia</h4>
                    </div>
                    <div class="card-body">
                        <!-- Mensaje de éxito o error -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('matriculas.store') }}" method="POST">
                            @csrf

                            <!-- Selección de Alumno -->
                            <div class="mb-3">
                                <label for="alumno_id" class="form-label">Seleccionar Alumno</label>
                                <select class="form-select" id="alumno_id" name="alumno_id" required>
                                    <option value="" selected disabled>-- Seleccione un alumno --</option>
                                    @foreach($alumnos as $alumno)
                                        <option value="{{ $alumno->id }}">
                                            {{ $alumno->nombre }} {{ $alumno->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Selección de Materia -->
                            <div class="mb-3">
                                <label for="materia_id" class="form-label">Seleccionar Materia</label>
                                <select class="form-select" id="materia_id" name="materia_id" required>
                                    <option value="" selected disabled>-- Seleccione una materia --</option>
                                    @foreach($materias as $materia)
                                        <option value="{{ $materia->id }}">
                                            {{ $materia->nombre_materia }} (Cupo: {{ $materia->cupo_maximo }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Matricular Alumno</button>
                        </form>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver a la lista de Alumnos</a>
                </div>
            </div>
        </div>
    </div>
@endsection
