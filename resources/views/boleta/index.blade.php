@extends('layouts.app')
@section('titulo')
    Boleta
@endsection
@section('contenido')
    <form method='GET' action="{{ route('boleta_index') }}">
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3>Seleccione un alumno para listar su boleta</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <select name="alumno" id="alumno-select" class="form-control selectpicker" required>
                                <option></option>
                            @foreach ($alumnos as $alumnoItem)
                                <option value="{{ $alumnoItem->iCodigoAlumno }}" @if($alumnoItem->iCodigoAlumno == $alumnoSeleccionado) selected @endif>{{ $alumnoItem->vchNombres.' '.$alumnoItem->vchApellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-primary btn-sm btn-block" type="submit">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if ($alumno == null)
        @if ($alumnoSeleccionado != null)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-warning">
                        <strong>Ayuda.</strong>&nbsp;<span>Seleccione un alumno de la lista superior y de clic en Buscar. A continuación aparecerán las materias a las cuales está inscrito el alumno seleccionó.</span>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card m-50">
                    <img class="card-img-top" src="media/estudiante.png" alt="Card image cap"  >
                    <div class="card-body">
                        <dl class="dl-horizontal">
                            <dt>Nombre(s)</dt>
                            <dd>{{ $alumno->vchNombres }}</dd>
                            <dt>Apellidos</dt>
                            <dd>{{ $alumno->vchApellidos }}</dd>
                            <dt>Fecha de nacimiento</dt>
                            <dd>{{ $alumno->dtFechaNac }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card m-50">
                    <div class="card-body">
                        @if ($boleta->count() > 0)
                            <table class="table table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th>Clave de materia</th>
                                        <th>Nombre de la materia</th>
                                        <th>Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boleta as $materia)
                                        <tr>
                                            <td>{{ $materia->vchCodigoMateria }}</td>
                                            <td>{{ $materia->vchMateria }}</td>
                                            @if ($materia->fCalificacion == null)
                                                <td><a href="{{ route('calificacion_index', ['alumno' => $alumno->iCodigoAlumno]) }}">Ir a calificar</a></td>
                                            @else
                                                <td>{{ $materia->fCalificacion }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning">
                                <span>El alumno no se ha inscrito a ninguna materia</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.selectpicker').select2({
                placeholder: 'Seleccione una opción',
                allowClear: true,
                allowClear: true,
                matcher: function(params, data) {
                    if ($.trim(params.term) === '') { return data; }
                    if (typeof data.text === 'undefined') { return null; }
                    var q = params.term.toLowerCase();
                    if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase() == q) {
                        return $.extend({}, data, true);
                    }
                    return null;
                }
            });
        });
    </script>
@endsection