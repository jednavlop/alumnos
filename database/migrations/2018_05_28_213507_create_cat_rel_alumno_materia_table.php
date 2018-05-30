<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatRelAlumnoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_rel_alumno_materia', function (Blueprint $table) {
            $table->integer('iCodigoAlumno')->unsigned()->comment('Código del alumno');
            $table->string('vchCodigoMateria', 5)->comment('Código de la materia');
            $table->float('fCalificacion')->nullable($value = true)->comment('Calificación del alumno en la materia');
            $table->index('iCodigoAlumno');
            $table->index('vchCodigoMateria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_rel_alumno_materia');
    }
}
