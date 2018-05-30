<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Materia;
use App\Inscripcion;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Muestra el formulario de calificación. 
     * Si se ha seleccionado un alumno entonces muestra la lista de las materias a calificar.
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

            if ($alumno != null) {
                $boleta = Alumno::join('cat_rel_alumno_materia', function($join) {
                    $join->on('cat_alumno.iCodigoAlumno', '=', 'cat_rel_alumno_materia.iCodigoAlumno');
                })->join('cat_materia', function($join) {
                    $join->on('cat_materia.vchCodigoMateria', '=', 'cat_rel_alumno_materia.vchCodigoMateria');
                })->where('cat_alumno.iCodigoAlumno', $alumnoSeleccionado)->get();
            }
        }

        $request->session()->put('alumno_calificar', ($alumno == null ? null : $alumno->iCodigoAlumno));

        return view('calificacion.index', compact('alumnos', 'alumnoSeleccionado', 'alumno', 'boleta'));
    }

    /**
     * Guarda las calificaciones del alumno.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $alumnoSeleccionado = $request->session()->get('alumno_calificar');
        if ($alumnoSeleccionado == null) {
            return redirect()->action('CalificacionController@index');
        }
        $alumno = Alumno::where('iCodigoAlumno', $alumnoSeleccionado)->first();
        if ($alumno == null) {
            return redirect()->action('CalificacionController@index');
        }
        $datos = $request->all();
        foreach ($datos as $llave => $valor) {
            if (substr($llave, 0, 1) == "_") continue;
            if (Inscripcion::existeRelacion($alumno->iCodigoAlumno, $llave)) {
                Inscripcion::actualizarCalificacion($alumno->iCodigoAlumno, $llave, $valor);
            }
        }
        return redirect()->action(
            'CalificacionController@index', ['alumno' => $alumno->iCodigoAlumno]
        );
    }

}
