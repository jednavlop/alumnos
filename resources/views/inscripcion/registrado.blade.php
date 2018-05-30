@extends('layouts.app')
@section('titulo')
    Alumno inscrito
@endsection
@section('contenido')
    <div class="row mb-4">
        <div class="col-md-12">
            @if ($existe)
                <p>El alumno ya ha sido registrado a esta materia previamente.</p>
            @else
                <p>El alumno ha sido correctamente inscrito a la materia.</p>
            @endif
            <p>Eliga que desea hacer a continuación:</p>
        </div>
        <div class="col-md-12">
            <a href="{{ route('inicio') }}" class="btn btn-primary" type="button">Volver a inicio</a>
            <a href="{{ route('inscripcion_formulario', ['materia' => $materia]) }}" class="btn btn-secondary" type="button">Inscribir otro alumno</a>
            <a href="{{ route('inscripcion_formulario', ['alumno' => $alumno]) }}" class="btn btn-info" type="button">Inscribir alumno a otra materia</a>
        </div>
    </div>
@endsection