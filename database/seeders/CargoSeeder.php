<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargo = [
            ['nombre_cargo' => 'Especialista de Estadistica e Informática','estado' => true],
            ['nombre_cargo' => 'Alcalde', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Edicion de Audio y Video.','estado' => true],
            ['nombre_cargo' => 'Especialista en Diseño Grafico y Diagramación','estado' => true],
            ['nombre_cargo' => 'Sub Gerente','estado' => true],
            ['nombre_cargo' => 'Gerente', 'estado' => true],
            ['nombre_cargo' => 'Especialista', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Presupuesto', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Planificación y Racionalización', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Coperacion Internacional', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Control Patrimonial', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Contrataciones y Adquisiciones', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Salud', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Educación,Cultura y Deporte', 'estado' => true],
            ['nombre_cargo' => 'Especialista Turistico,Artesanal y Empresarial', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Gestion Ambiental', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Saneamiento Básico Integral-ATS', 'estado' => true],
            ['nombre_cargo' => 'Especialista en Habilitaciones Urbanas -Evaluador', 'estado' => true],
            ['nombre_cargo' => 'Especialista Prevención de Riesgos I', 'estado' => true],

        ];


        DB::table('cargos')->insert($cargo);
    }
}
