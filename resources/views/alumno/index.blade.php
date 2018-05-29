@extends('layouts.app')
@section('contenido')
    
    @if(count($alumnos) == 0)
        <div class="jumbotron">
            <h1 class="display-4">Nada por aqu&iacute;</h1>
            <p class="lead">No hay ning&uacute;n usuario regitrado en el sistema.</p>
            <hr class="my-4">
            <p>Puede ir al formulario de creaci&oacute;n de usuario dando clic en el siguiente bot&oacute;n:</p>
            <p class="lead">
                <a href="" class="btn btn-primary btn-lg" role="button"></a>
            </p>
        </div>
    @else
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <h2>Lista de alumnos</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <form method="POST" action="{{ route('usuarios_buscar') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            
                        </div>
                        <input name="buscar" type="text" class="form-control" placeholder="Buscar por nombre o apellido" aria-label="Búsqueda" value="{{ $buscar }}" />
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
                                <a href="{{ route('usuarios_buscar', ['orden' => $columnaOrdenCodigo]) }}">
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
                                <a href="{{ route('usuarios_buscar', ['orden' => $columnaOrdenNombre]) }}">
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
                            <th>
                                <a href="{{ route('usuarios_buscar', ['orden' => $columnaOrdenApellidos]) }}">
                                    Apellidos
                                </a>
                                <span>
                                    @if ($columnaOrdenApellidosAct)
                                        @if ($columnaOrdenApellidos === "apellidos")
                                            &#x2193;
                                        @else
                                            &#x2191;
                                        @endif
                                    @endif
                                </span>
                            </th>
                            <th>
                                <a href="{{ route('usuarios_buscar', ['orden' => $columnaOrdenFechaNac]) }}">
                                    Fecha de nacimiento
                                </a>
                                <span>
                                    @if ($columnaOrdenFechaNacAct)
                                        @if ($columnaOrdenFechaNac === "fecha_nac")
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
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>
                                    {{ $alumno->iCodigoAlumno }}
                                </td>
                                <td>
                                    {{ $alumno->vchNombres }}
                                </td>
                                <td>
                                    {{ $alumno->vchApellidos }}
                                </td>
                                <td>
                                    {{ $alumno->dtFechaNac }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="top" type="button" title="Ir a la boleta de calificaciones">Boleta</a>
                                    <a href="#" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="top" type="button" title="Inscribir a una materia">Incribiir</a>
                                    <a href="#" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="top" type="button" title="Capturar calificaciones">Calificar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {{ $alumnos->links() }}
            </div>
        </div>
    @endif
@endsection
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>