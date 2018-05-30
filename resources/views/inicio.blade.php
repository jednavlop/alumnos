@extends('layouts.app')
@section('contenido')
    <div class="jumbotron">
        <h2 class="display-8">Bienvenido/a</h2>
        <p class="lead">Este es el portal escolar. Le permitirá gestionar los alumnos, las materias y las calificaciones. A continuación se encuentran accesos directos a las tareas más comunes.</p>
    </div>
    <div class="card-deck">
        <div class="card bg-light">
            <img class="card-img-top" src="{{ asset('media/lista-alumnos.jpg') }}" alt="Card image" height="160">
            <div class="card-body">
                <p class="card-text">Vea y gestione la lista de alumnos. Realice búsquedas por nombre y apellidos.</p>
                <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Ver lista de alumnos</a>
            </div>
        </div>
        <div class="card bg-light">
            <img class="card-img-top" src="{{ asset('media/lista-materias.jpg') }}" alt="Card image" height="160">
            <div class="card-body">
                <p class="card-text">Vea las materias a las cuales los alumnos pueden inscribirse. Gestione las inscripciones.</p>
                <a href="{{ route('materias.index') }}" class="btn btn-primary">Ver lista de materias</a>
            </div>
        </div>
        <div class="card bg-light">
            <img class="card-img-top" src="{{ asset('media/calificacion.jpg') }}" alt="Card image" height="160">
            <div class="card-body">
                <p class="card-text">Módulo de captura de calificaciones por alumno y por materia.</p>
                <a href="{{ route('calificacion_index') }}" class="btn btn-primary">Capturar calificaciones</a>
            </div>
        </div>
        <div class="card bg-light">
            <img class="card-img-top" src="{{ asset('media/buscar-boleta.png') }}" alt="Card image" height="160">
            <div class="card-body">
                <p class="card-text">Consulte la boleta de calificaciones. El detalle incluye la información de los alumnos.</p>
                <a href="{{ route('boleta_index') }}" class="btn btn-primary">Consultar boleta</a>
            </div>
        </div>
    </div>
@endsection