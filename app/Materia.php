<?php

namespace App;

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

}
