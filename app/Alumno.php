<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{

    /**
     * Especifica el nombre de la tabla.
     */
    protected $table = 'cat_alumno';

    /**
     * Define el nombre de la llave.
     */
    protected $primaryKey = 'cat_alumno';

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
    protected $fillable = ['vchNombres', 'vchApellidos', 'dtFechaNac'];

    /**
     * Personaliza la búsqueda de alumnos conforme a los filtros indicados por el usuario.
     * 
     * @param string $buscar
     * @param string $orden
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public static function buscarAlumnos($buscar, $orden) {

        // Realizaremos una consulta de alumnos con Eloquent.
        // Utilizamos un query builder para modificar la consulta según los parámetros del usuario.
        $consulta = DB::table('cat_alumno');

        // Aplicamos el filtro indicado, pudiendo ser al código o al nombre y apellidos.
        if ($buscar != null) {
            if (is_numeric($buscar)) {
                $consulta->where('iCodigoAlumno', $buscar);
            } else {
                $consulta->where(function($query) use ($buscar) {
                    $query->where('vchNombres', 'like', '%'.$buscar.'%')
                        ->orWhere('vchApellidos', 'like', '%'.$buscar.'%');
                });
            }
        }

        // Ordenamos según lo indicado por el usuario.
        switch ($orden) {
            case 'nombre_desc':
                $consulta->orderBy('vchNombres', 'desc');
                break;
            case 'nombre':
                $consulta->orderBy('vchNombres', 'asc');
                break;
            case 'apellidos_desc':
                $consulta->orderBy('vchApellidos', 'desc');
                break;
            case 'apellidos':
                $consulta->orderBy('vchApellidos', 'asc');
                break;
            case 'fecha_nac_desc':
                $consulta->orderBy('dtFechaNac', 'desc');
                break;
            case 'fecha_nac':
                $consulta->orderBy('dtFechaNac', 'asc');
                break;
            case 'codigo_desc':
                $consulta->orderBy('iCodigoAlumno', 'desc');
                break;
            case 'codigo':
            default:
                $consulta->orderBy('iCodigoAlumno', 'asc');
                break;
        }

        // Obtenemos el set de datos mediante la paginación integrada de Laravel.
        // Personalizamos el tamaño de página a 10.
        return $consulta->paginate(10);

    }

    /**
     * Especificamos una relación One-To-Many con las materias inscritas.
     */
    public function materiasInscritas()
    {
        return $this->hasMany('App\Inscripcion', 'iCodigoAlumno', 'iCodigoAlumno');
    }

}
