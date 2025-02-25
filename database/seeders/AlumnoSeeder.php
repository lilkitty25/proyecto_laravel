<?php

namespace Database\Seeders;

use App\Models\Alumno;

use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 alumnos de ejemplo
        Alumno::factory(10)->create();
    }
}
