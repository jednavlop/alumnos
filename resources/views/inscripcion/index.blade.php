@extends('layouts.app')
@section('titulo')
    Inscribir alumno
@endsection
@section('contenido')
    <form method="GET" action="{{ route('inscripcion_index') }}">
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3>Seleccione un alumno para gestionar las materias inscritas</h3>
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
    @if ($alumno !== null)
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Materias inscritas
                    </div>
                    <div class="card-body">
                        @if ($materiasInscritas == null || $materiasInscritas->count() == 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <span>El alumno no se ha inscrito a ninguna materia todav&iacute;a</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form method="POST" aciton="{{ route('inscripcion_delete') }}">
                                @csrf
                                {{ method_field('delete') }}
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control" name="materias[]" size="15" required multiple>
                                            @foreach ($materiasInscritas as $materia)
                                                <option value="{{ $materia->vchCodigoMateria }}">{{ $materia->vchMateria }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-outline-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Desinscribir las materias seleccionadas"><strong>>></strong></button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cat&aacute;logo de materias disponibles
                    </div>
                    <div class="card-body">
                        @if ($materiasDisponibles == null)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <span>El cat&aacute;logo de materias est&aacute; vac&iacute;o</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if ($materiasDisponibles->count() == 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <span>El alumno se ha inscrito a todas las materias disponibles</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form method="POST" aciton="{{ route('inscripcion_store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                                <button class="btn btn-outline-success" type="submit" data-toggle="tooltip" data-placement="top" title="Inscribirse a las materias seleccionadas"><strong><<</strong></button>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control" name="materias[]" size="15" required multiple>
                                                @foreach ($materiasDisponibles as $materia)
                                                    <option value="{{ $materia->vchCodigoMateria }}">{{ $materia->vchMateria }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
@section('js')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection