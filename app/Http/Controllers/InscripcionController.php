<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Materia;
use App\Inscripcion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Devuelve el formulario para la inscripción/desincripción a materias.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $alumnoSeleccionado = $request->query('alumno');
        $alumnos = Alumno::all();
        $alumno  = null;

        if ($alumnoSeleccionado != null) {
            $alumno = Alumno::where('iCodigoAlumno', $alumnoSeleccionado)->first();
        }

        $materiasInscritas = null;
        $materiasDisponibles = null;

        if ($alumno != null) {
            $materiasInscritas = Alumno::listarInscritas($alumno->iCodigoAlumno);
            $materiasDisponibles = Materia::listarDisponibles($alumno->iCodigoAlumno);
        }

        $request->session()->put('alumno_inscripcion', ($alumno == null ? null : $alumno->iCodigoAlumno));

        return view('inscripcion.index', compact('alumnos', 'alumnoSeleccionado', 'alumno', 'materiasInscritas', 'materiasDisponibles'));
    }

    /**
     * Registra la inscripción a una materia por parte de un alumno.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $alumnoSeleccionado = $request->session()->get('alumno_inscripcion');
        if ($alumnoSeleccionado == null) {
            return redirect()->action('InscripcionController@index');
        }
        $alumno = Alumno::where('iCodigoAlumno', $alumnoSeleccionado)->first();
        if ($alumno == null) {
            return redirect()->action('InscripcionController@index');
        }
        $materias = $request->input('materias');
        if ($materias == null || count($materias) == 0) {
            return redirect()->action('InscripcionController@index');
        }
        foreach ($materias as $indice => $materia) {
            if (!Inscripcion::existeRelacion($alumno->iCodigoAlumno, $materia)) {
                $inscripcion = new Inscripcion;

                $inscripcion->iCodigoAlumno = $alumno->iCodigoAlumno;
                $inscripcion->vchCodigoMateria = $materia;
        
                $inscripcion->save();
            }
        }
        return redirect()->action(
            'InscripcionController@index', ['alumno' => $alumno->iCodigoAlumno]
        );
    }

    public function delete(Request $request) {
        $alumnoSeleccionado = $request->session()->get('alumno_inscripcion');
        if ($alumnoSeleccionado == null) {
            return redirect()->action('InscripcionController@index');
        }
        $alumno = Alumno::where('iCodigoAlumno', $alumnoSeleccionado)->first();
        if ($alumno == null) {
            return redirect()->action('InscripcionController@index');
        }
        $materias = $request->input('materias');
        if ($materias == null || count($materias) == 0) {
            return redirect()->action('InscripcionController@index');
        }
        foreach ($materias as $indice => $materia) {
            Inscripcion::eliminarRelacion($alumno->iCodigoAlumno, $materia);
        }
        return redirect()->action(
            'InscripcionController@index', ['alumno' => $alumno->iCodigoAlumno]
        );
    }


}
