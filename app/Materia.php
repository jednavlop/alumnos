<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * Especifica el nombre de la tabla.
     */
    protected $table = 'cat_materia';

    /**
     * Define el nombre de la llave.
     */
    protected $primaryKey = 'vchCodigoMateria';

    /**
     * Indicamos a Eloquent que nuestra llave es tipo string.
     */
    protected $keyType = 'string';

    /**
     * Indicamos a Eloquent que nuestra llave no es de tipo autoincremental.
     */
    public $incrementing = false;

    /**
     * Indica las propiedades que se podrán editar por el usuario.
     */
    protected $fillable = ['vchCodigoMateria', 'vchMateria'];


    /**
     * Personaliza la búsqueda de materias conforme a los filtros indicados por el usuario.
     * 
     * @param string $buscar
     * @param string $orden
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public static function buscarMaterias($buscar, $orden) {

        // Realizaremos una consulta de materias con Eloquent.
        // Utilizamos un query builder para modificar la consulta según los parámetros del usuario.
        $consulta = DB::table('cat_materia');

        // Aplicamos el filtro indicado, pudiendo ser al código o al nombre.
        if ($buscar != null) {
            $consulta->where(function($query) use ($buscar) {
                $query->where('vchCodigoMateria', $buscar)
                    ->orWhere('vchMateria', 'like', '%'.$buscar.'%');
            });
        }

        // Ordenamos según lo indicado por el usuario.
        switch ($orden) {
            case 'nombre_desc':
                $consulta->orderBy('vchMateria', 'desc');
                break;
            case 'nombre':
                $consulta->orderBy('vchMateria', 'asc');
                break;
            case 'codigo_desc':
                $consulta->orderBy('vchCodigoMateria', 'desc');
                break;
            case 'codigo':
            default:
                $consulta->orderBy('vchCodigoMateria', 'asc');
                break;
        }

        // Obtenemos el set de datos mediante la paginación integrada de Laravel.
        // Personalizamos el tamaño de página a 10.
        return $consulta->paginate(10);

    }

    /**
     * Lista el catálogo de materias disponible para un alumno restando las ya inscritas por el mismo.
     */
    public static function listarDisponibles($alumno) {
        return Materia::leftJoin('cat_rel_alumno_materia', function($join) use ($alumno) {
            $join->on('cat_materia.vchCodigoMateria', '=', 'cat_rel_alumno_materia.vchCodigoMateria');
            $join->on(DB::raw($alumno), '=', 'cat_rel_alumno_materia.iCodigoAlumno');
        })->where([
            ['cat_rel_alumno_materia.vchCodigoMateria', '=', null]
        ])->get(['cat_materia.vchCodigoMateria', 'cat_materia.vchMateria']);
    }

}
