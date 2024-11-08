<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar un enlace a una fuente de iconos de FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @yield('styles') <!-- Aquí se pueden cargar estilos adicionales si es necesario -->
</head>
<body>
    <!-- Barra de navegación con fondo oscuro y texto claro -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-user-graduate"></i> Registro de Alumnos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('alumnos.index') }}">
                            <i class="fas fa-users"></i> Alumnos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('materias.index') }}">
                            <i class="fas fa-book"></i> Materias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matriculas.create') }}">
                            <i class="fas fa-pencil-alt"></i> Inscripcion a Materias
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- Aquí se inyecta el contenido de cada vista -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts') <!-- Aquí se pueden cargar scripts adicionales si es necesario -->
</body>
</html>
