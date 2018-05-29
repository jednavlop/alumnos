<?php

use Illuminate\Database\Seeder;

class CatAlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Jesús Eduardo',
            'vchApellidos' => 'Navarro López',
            'dtFechaNac'   => '1994-10-31'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Eneida',
            'vchApellidos' => 'Teresa Maite',
            'dtFechaNac'   => '1972-05-04'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Arsenio',
            'vchApellidos' => 'Aracely Gertrudis',
            'dtFechaNac'   => '1976-09-14'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Rosalva',
            'vchApellidos' => 'Gonzalo Régulo',
            'dtFechaNac'   => '1988-10-14'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Anastasio',
            'vchApellidos' => 'Rosa Jovita',
            'dtFechaNac'   => '1944-02-02'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Pedro',
            'vchApellidos' => 'Renato Amelia',
            'dtFechaNac'   => '1999-01-21'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Artemio',
            'vchApellidos' => 'Marisol Benito',
            'dtFechaNac'   => '2006-07-08'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Idoya',
            'vchApellidos' => 'Julio Arsenio',
            'dtFechaNac'   => '1991-01-14'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Isidro',
            'vchApellidos' => 'Benito Regina',
            'dtFechaNac'   => '1992-02-15'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Aristides',
            'vchApellidos' => 'Clarisa Sofía',
            'dtFechaNac'   => '1993-03-12'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Rosalina',
            'vchApellidos' => 'Catalina Rosalva',
            'dtFechaNac'   => '1994-06-06'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Rosalina',
            'vchApellidos' => 'Cosme Duilio',
            'dtFechaNac'   => '1994-11-03'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Elías',
            'vchApellidos' => 'Nieves Gabino',
            'dtFechaNac'   => '1978-03-03'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Alonso',
            'vchApellidos' => 'Horacio Rodrigo',
            'dtFechaNac'   => '1974-05-05'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Xochitl',
            'vchApellidos' => 'Ameria Hortensia',
            'dtFechaNac'   => '1945-06-01'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Clotilde',
            'vchApellidos' => 'Apolinar Fulgencio',
            'dtFechaNac'   => '1984-12-07'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Cruz',
            'vchApellidos' => 'Eligio Pía',
            'dtFechaNac'   => '2005-01-05'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Mauricio',
            'vchApellidos' => 'Demetrio Eduardo',
            'dtFechaNac'   => '2000-04-25'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Erasmo',
            'vchApellidos' => 'Joaquín Darío',
            'dtFechaNac'   => '1993-04-08'
        ]);
        DB::table('cat_alumno')->insert([
            'vchNombres'   => 'Maricela',
            'vchApellidos' => 'Mariano Héctor',
            'dtFechaNac'   => '1985-09-14'
        ]);
    }
}
