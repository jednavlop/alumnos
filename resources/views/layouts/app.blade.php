<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Escuela - @yield('title')</title>
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">MIPC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alumnos</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Lista de alumnos</a>
                            <a href="#" class="dropdown-item">Boleta de calificaciones</a>
                            <a href="#" class="dropdown-item">Captura de calificaciones</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Materias</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Lista de materias</a>
                            <a href="#" class="dropdown-item">Módulo de inscripción</a>
                        </div>
                    </li>
                </ul>
            </div>  
        </nav>
        <div class="container">
            @yield('contenido')
        </div>
    </body>
</html>
