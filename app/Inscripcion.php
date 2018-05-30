<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    /**
     * Especifica el nombre de la tabla.
     */
    protected $table = 'cat_rel_alumno_materia';

    /**
     * Define que no tenemos llave primaria.
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

    /**
     * Elimina la inscripción de un alumno a una materia.
     */
    public static function eliminarRelacion($alumno, $materia) {
        return Inscripcion::where([
            ['iCodigoAlumno', '=', $alumno],
            ['vchCodigoMateria', '=', $materia]
        ])->delete();
    }

    /**
     * Actualiza el registro para guardar la calificación.
     */
    public static function actualizarCalificacion($alumno, $materia, $calificacion) {
        DB::table('cat_rel_alumno_materia')->where([
            ['iCodigoAlumno', '=', $alumno],
            ['vchCodigoMateria', '=', $materia]
        ])->update(['fCalificacion' => $calificacion]);
    }

}
