@extends('layouts.app')
@section('titulo')
    Lista de materias
@endsection
@section('contenido')
    @if(count($materias) == 0)
        <div class="jumbotron">
            <h1 class="display-4">Nada por aqu&iacute;</h1>
            <p class="lead">No hay ninguna materia registrada en el sistema.</p>
        </div>
    @else
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <h2>Lista de materias</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <form method="POST" action="{{ route('materias_buscar') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            
                        </div>
                        <input name="buscar" type="text" class="form-control" placeholder="Buscar por código o nombre" aria-label="Búsqueda" value="{{ $buscar }}" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <table class="table table-sm table-responsive table-hover w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ route('materias_buscar', ['orden' => $columnaOrdenCodigo]) }}">
                                    Código
                                </a>
                                <span>
                                    @if ($columnaOrdenCodigoAct)
                                        @if ($columnaOrdenCodigo === "codigo")
                                            &#x2193;
                                        @else
                                            &#x2191;
                                        @endif
                                    @endif
                                </span>
                            </th>
                            <th>
                                <a href="{{ route('materias_buscar', ['orden' => $columnaOrdenNombre]) }}">
                                    Nombre(s)
                                </a>
                                <span>
                                    @if ($columnaOrdenNombreAct)
                                        @if ($columnaOrdenNombre === "nombre")
                                            &#x2193;
                                        @else
                                            &#x2191;
                                        @endif
                                    @endif
                                </span>
                            </th>
                            <th>Accesos directos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materias as $materia)
                            <tr>
                                <td>
                                    {{ $materia->vchCodigoMateria }}
                                </td>
                                <td>
                                    {{ $materia->vchMateria }}
                                </td>
                                <td>
                                    <a href="{{ route('inscripcion_formulario', ['materia' => $materia->vchCodigoMateria]) }}" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="top" type="button" title="Inscribir un alumno">Inscribir alumnos</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {{ $materias->links() }}
            </div>
        </div>
    @endif
@endsection
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>