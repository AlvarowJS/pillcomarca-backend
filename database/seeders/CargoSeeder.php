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
            ['nombre_cargo' => 'Especialista de Estadistica e Informática', 'dependencia_id' => 1, 'estado' => true],
            ['nombre_cargo' => 'Alcalde', 'dependencia_id' => 34, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Edicion de Audio y Video.', 'dependencia_id' => 5, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Diseño Grafico y Diagramación', 'dependencia_id' => 5, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 6, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 7, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 35, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 32, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Presupuesto', 'dependencia_id' => 32, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Planificación y Racionalización', 'dependencia_id' => 32, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Coperacion Internacional', 'dependencia_id' => 33, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 8, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 9, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 10, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 11, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Control Patrimonial', 'dependencia_id' => 11, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 12, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Contrataciones y Adquisiciones', 'dependencia_id' => 12, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 13, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 14, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 15, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 17, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 18, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Salud I', 'dependencia_id' => 18, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Educación,Cultura y Deporte', 'dependencia_id' => 18, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 19, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 20, 'estado' => true],
            ['nombre_cargo' => 'Especialista Turistico,Artesanal y Empresarial', 'dependencia_id' => 20, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 21, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 23, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Gestion Ambiental', 'dependencia_id' => 23, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 24, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 25, 'estado' => true],
            ['nombre_cargo' => 'Gerente', 'dependencia_id' => 26, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 27, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 28, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Saneamiento Básico Integral-ATS', 'dependencia_id' => 28, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 29, 'estado' => true],
            ['nombre_cargo' => 'Especialista en Habilitaciones Urbanas -Evaluador', 'dependencia_id' => 29, 'estado' => true],
            ['nombre_cargo' => 'Sub Gerente', 'dependencia_id' => 30, 'estado' => true],
            ['nombre_cargo' => 'Especialista Prevención de Riesgos I', 'dependencia_id' => 30, 'estado' => true],

        ];


        DB::table('cargos')->insert($cargo);
    }
}
