<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_materia', function (Blueprint $table) {
            $table->string('vchCodigoMateria', 5)->comment('Código de la materia');
            $table->string('vchMateria', 50)->comment('Nombre de la materia');
            $table->timestamps();
            $table->primary('vchCodigoMateria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_materia');
    }
}
