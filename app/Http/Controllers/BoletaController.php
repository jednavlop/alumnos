<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Materia;
use App\Inscripcion;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Lista la boleta de un alumno.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $alumnos = Alumno::all();
        $alumnoSeleccionado = $request->query('alumno');

        $alumno = null;
        $boleta = null;

        if ($alumnoSeleccionado != null) {
            $alumno = Alumno::where('iCodigoAlumno', $alumnoSeleccionado)->first();
            $boleta = Alumno::join('cat_rel_alumno_materia', function($join) {
                $join->on('cat_alumno.iCodigoAlumno', '=', 'cat_rel_alumno_materia.iCodigoAlumno');
            })->join('cat_materia', function($join) {
                $join->on('cat_materia.vchCodigoMateria', '=', 'cat_rel_alumno_materia.vchCodigoMateria');
            })->where('cat_alumno.iCodigoAlumno', $alumnoSeleccionado)->get();
        }

        return view('boleta.index', compact('alumnos', 'alumno', 'alumnoSeleccionado', 'boleta'));
    }
}
