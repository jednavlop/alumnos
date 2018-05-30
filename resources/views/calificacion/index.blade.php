@extends('layouts.app')
@section('title')
    Calificar
@endsection
@section('contenido')
    <form method='GET' action="{{ route('calificacion_index') }}">
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3>Seleccione un alumno para comenzar el proceso de calificación</h3>
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
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <strong>Ayuda.</strong>&nbsp;<span>Seleccione un alumno de la lista superior y de clic en Buscar. A continuación aparecerán las materias a las cuales está inscrito el alumno que seleccionó.</span>
                </div>
            </div>
        </div>
    @else
        @if ($boleta->count() > 0)
            <form method="POST" action="{{ route('calificacion_store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Ayuda.</strong>&nbsp;<span>A continuación, ingrese las calificaciones para el alumno. Cuando termine, de clic en el botón verde. Recuerde que puede usar hasta dos decimales.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Código de materia</th>
                                    <th>Nombre de materia</th>
                                    <th>Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boleta as $materia)
                                    <tr>
                                        <td>
                                            {{ $materia->vchCodigoMateria }}
                                        </td>
                                        <td>
                                            {{ $materia->vchMateria }}
                                        </td>
                                        <td>
                                            <input class="calificacion form-control form-control-sm" name="{{ $materia->vchCodigoMateria }}" type="number" step=".01" @if ($materia->fCalificacion != null) value="{{ $materia->fCalificacion }}" @endif required />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success float-right" type="submit">Guardar calificaciones</button>
                    </div>
                </div>
            </form>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <span>El alumno no se ha inscrito a ninguna materia</span>
                    </div>
                </div>
            </div>
        @endif
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