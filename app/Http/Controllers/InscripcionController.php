<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Materia;
use App\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Devuelve el formulario para la inscripción a una materia.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formulario(Request $request) {
        $materias = Materia::all();
        $alumnos  = Alumno::all();

        $materiaSeleccionada = $request->query('materia');
        $alumnoSeleccionado = $request->query('alumno');

        return view('inscripcion.formulario', compact('materias', 'alumnos', 'materiaSeleccionada', 'alumnoSeleccionado'));
    }

    /**
     * Registra la inscripción a una materia por parte de un alumno.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request) {
        $request->validate([
            'materia' => 'required|string|max:5|exists:cat_materia,vchCodigoMateria',
            'alumno'  => 'required|integer|exists:cat_alumno,iCodigoAlumno'
        ]);

        $materia = $request->input('materia');
        $alumno =  $request->input('alumno');
        $existe =  Inscripcion::existeRelacion($alumno, $materia);

        if (!$existe) {
            $inscripcion = new Inscripcion;

            $inscripcion->iCodigoAlumno = $alumno;
            $inscripcion->vchCodigoMateria = $materia;
    
            $inscripcion->save();
        };

        return view('inscripcion.registrado', compact('alumno', 'materia', 'existe'));
    }


}
