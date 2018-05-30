<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    /**
     * Especifica el nombre de la tabla.
     */
    protected $table = 'cat_rel_alumno_materia';

    /**
     * Define que no tenemos una llave primaria.
     */
    protected $primaryKey = null;

    /**
     * Indicamos a Eloquent que nuestra llave no es de tipo autoincremental.
     */
    public $incrementing = false;
    
    /**
     * Deshabilita las columnas 'created_at' y 'updated_at' para este modelo.
     */
    public $timestamps = false;

    /**
     * Indica las propiedades que se podrán editar por el usuario.
     */
    protected $fillable = ['iCodigoAlumno', 'vchCodigoMateria', 'fCalificacion'];

    /**
     * Especifica la entidad del alumno inscrito.
     */
    public function alumno() {
        return $this->belongsTo('App\Alumno', 'iCodigoAlumno', 'iCodigoAlumno');
    }


    /**
     * Verifica si un alumno ha sido registrado antes a una materia.
     */
    public static function existeRelacion($alumno, $materia) {
        return Inscripcion::where([
            ['iCodigoAlumno', '=', $alumno],
            ['vchCodigoMateria', '=', $materia]
        ])->count() > 0;
    }

}
