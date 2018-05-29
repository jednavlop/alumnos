<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Variables que personalizarán la consulta de alumnos.
        $buscar = $request->input('buscar');
        $orden  = $request->query('orden') ?? $request->session()->get('orden') ?? "codigo";
        $filtro = $request->session()->get('filtro');

        // Banderas para habilitar la ordenación por columna.
        $columnaOrdenCodigo    = $orden === "codigo" ? "codigo_desc" : "codigo";
        $columnaOrdenNombre    = $orden === "nombre" ? "nombre_desc" : "nombre";
        $columnaOrdenApellidos = $orden === "apellidos" ? "apellidos_desc" : "apellidos";
        $columnaOrdenFechaNac  = $orden === "fecha_nac" ? "fecha_nac_desc" : "fecha_nac";
        
        // Banderas para colocar el ícono de ordenación
        $columnaOrdenCodigoAct    = $orden === "codigo" || $orden === "codigo_desc";
        $columnaOrdenNombreAct    = $orden === "nombre" || $orden === "nombre_desc";
        $columnaOrdenApellidosAct = $orden === "apellidos" || $orden ===  "apellidos_desc";
        $columnaOrdenFechaNacAct  = $orden === "fecha_nac" || $orden ===  "fecha_nac_desc";

        // Se resetea la página en caso de ingresar un nuevo término de búsqueda.
        if ($buscar == null) {
            $buscar = $filtro;
        }

        // Invocamos la busqueda personalizada desde el Modelo.
        $alumnos = Alumno::buscarAlumnos($buscar, $orden);

        // Respaldamos los parámetros de consulta.
        $request->session()->put('filtro', $filtro);
        $request->session()->put('orden',  $orden);

        // Vista de tabla.
        return view('alumno.index', compact(
            'alumnos', 
            'buscar',
            'columnaOrdenCodigo', 
            'columnaOrdenNombre', 
            'columnaOrdenApellidos',
            'columnaOrdenFechaNac',
            'columnaOrdenCodigoAct', 
            'columnaOrdenNombreAct', 
            'columnaOrdenApellidosAct',
            'columnaOrdenFechaNacAct')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

}
