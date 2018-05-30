@extends('layouts.app')
@section('titulo')
    Inscribir alumno
@endsection
@section('contenido')
    @if ($errors->any())
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <h4>Ups! Han ocurrido algunos errores. Verifique la información e inténtelo de nuevo.</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('inscripcion_registro') }}">
        @csrf
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3>Seleccionar una materia</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <select name="materia" id="materia-select" class="form-control selectpicker">
                            <option></option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->vchCodigoMateria }}" @if($materia->vchCodigoMateria == $materiaSeleccionada) selected @endif>{{ $materia->vchMateria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3>Seleccionar alumno</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <select name="alumno" id="alumno-select" class="form-control selectpicker">
                                <option></option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->iCodigoAlumno }}" @if($alumno->iCodigoAlumno == $alumnoSeleccionado) selected @endif>{{ $alumno->vchNombres.' '.$alumno->vchApellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="{{ route('inicio') }}" type="button" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary float-right">Registrar</button>
            </div>
        </div>
    </form>
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