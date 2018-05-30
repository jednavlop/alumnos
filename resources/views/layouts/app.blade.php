<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Escuela - @yield('titulo')</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/app.css" />
        <script src="js/app.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="{{ route('inicio') }}">MIPC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alumnos</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('alumnos.index') }}" class="dropdown-item">Lista de alumnos</a>
                            <a href="{{ route('boleta_index')  }}" class="dropdown-item">Boleta de calificaciones</a>
                            <a href="{{ route('calificacion_index')  }}" class="dropdown-item">Captura de calificaciones</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Materias</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('materias.index') }}" class="dropdown-item">Lista de materias</a>
                            <a href="{{ route('inscripcion_index') }}" class="dropdown-item">Módulo de inscripción</a>
                        </div>
                    </li>
                </ul>
            </div>  
        </nav>
        <div class="container">
            @yield('contenido')
        </div>
        @yield('js')
        <footer class="footer">
        <div class="container">
            <span class="text-muted">MIPC - Comunicaciones</span>
        </div>
        </footer>
    </body>
</html>
