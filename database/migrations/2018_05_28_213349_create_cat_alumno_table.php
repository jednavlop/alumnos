<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_alumno', function (Blueprint $table) {
            $table->increments('iCodigoAlumno')->comment('ID autoincremental');
            $table->string('vchNombres', 50)->comment('Nombre(s)');
            $table->string('vchApellidos', 50)->comment('Apellidos');
            $table->date('dtFechaNac')->comment('Fecha de nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_alumno');
    }
}
