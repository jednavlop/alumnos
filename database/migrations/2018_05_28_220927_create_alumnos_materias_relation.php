<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosMateriasRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cat_rel_alumno_materia', function (Blueprint $table) {
            $table->foreign('iCodigoAlumno')
                ->references('iCodigoAlumno')
                ->on('cat_alumno')
                ->onDelete('cascade');

            $table->foreign('vchCodigoMateria')
                ->references('vchCodigoMateria')
                ->on('cat_materia')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cat_rel_alumno_materia', function (Blueprint $table) {
            $table->dropForeign('cat_rel_alumno_materia_iCodigoAlumno_foreign');
            $table->dropForeign('cat_rel_alumno_materia_vchCodigoMateria_foreign');
        });
    }
}
