<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Variables que personalizarán la consulta de materias.
        $buscar = $request->input('buscar');
        $orden  = $request->query('orden') ?? $request->session()->get('orden') ?? "codigo";
        $filtro = $request->session()->get('filtro');

        // Banderas para habilitar la ordenación por columna.
        $columnaOrdenCodigo = $orden === "codigo" ? "codigo_desc" : "codigo";
        $columnaOrdenNombre = $orden === "nombre" ? "nombre_desc" : "nombre";
        
        // Banderas para colocar el ícono de ordenación
        $columnaOrdenCodigoAct = $orden === "codigo" || $orden === "codigo_desc";
        $columnaOrdenNombreAct = $orden === "nombre" || $orden === "nombre_desc";

        // Se resetea la página en caso de ingresar un nuevo término de búsqueda.
        if ($buscar == null) {
            $buscar = $filtro;
        }

        // Invocamos la busqueda personalizada desde el Modelo.
        $materias = Materia::buscarMaterias($buscar, $orden);

        // Respaldamos los parámetros de consulta.
        $request->session()->put('filtro', $filtro);
        $request->session()->put('orden',  $orden);

        // Vista de tabla.
        return view('materia.index', compact(
            'materias', 
            'buscar',
            'columnaOrdenCodigo', 
            'columnaOrdenNombre', 
            'columnaOrdenCodigoAct', 
            'columnaOrdenNombreAct')
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
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }

}
