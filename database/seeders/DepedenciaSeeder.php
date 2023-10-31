<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepedenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencia = [
            ['nombre_dependencia' => 'Área de Estadistica e Informática'],
            ['nombre_dependencia' => 'Oficina de Control Institucional'],
            ['nombre_dependencia' => 'Procuraduria Pública Municipal'],
            ['nombre_dependencia' => 'Gerencia de Secretaria General'],
            ['nombre_dependencia' => 'Sub Gerencia de Imagen Institucional'],
            ['nombre_dependencia' => 'Sub Gerencia de Orientación y Trámite Documentario'],
            ['nombre_dependencia' => 'Sub Gerencia Archivo Municipal'],
            ['nombre_dependencia' => 'Gerencia de Administración'],
            ['nombre_dependencia' => 'Sub Gerencia de Recursos Humanos'],
            ['nombre_dependencia' => 'Sub Gerencia de Tesorería'],
            ['nombre_dependencia' => 'Sub Gerencia de Contabilidad'],
            ['nombre_dependencia' => 'Sub Gerencia de Logística'],
            ['nombre_dependencia' => 'Gerencia de Administración Tributaria'],
            ['nombre_dependencia' => 'Sub Gerencia de Recaudación Tributaria'],
            ['nombre_dependencia' => 'Sub Gerencia de Fiscalización Tributaria'],
            ['nombre_dependencia' => 'Sub Gerencia de Ejecución Coactivo'],
            ['nombre_dependencia' => 'Gerencia de Desarrollo Social y Económico'],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Social y Bienestar'],
            ['nombre_dependencia' => 'Sub Gerencia de Registro Civil'],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Económico'],
            ['nombre_dependencia' => 'Sub Gerencia de Seguridad Ciudadana e Institucional'],
            ['nombre_dependencia' => 'Sub Gerencia de DEMUNA'],
            ['nombre_dependencia' => 'Gerencia de Medio Ambiente'],
            ['nombre_dependencia' => 'Sub Gerencia de Limpieza Pública'],
            ['nombre_dependencia' => 'Sub Gerencia de Parques y Jardines'],
            ['nombre_dependencia' => 'Gerencia de Infraestructura y Desarrollo Territorial'],
            ['nombre_dependencia' => 'Sub Gerencia de Estudios y Proyectos'],
            ['nombre_dependencia' => 'Sub Gerencia de Obras y Liquidaciones'],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Urbano, Rural y Catastro'],
            ['nombre_dependencia' => 'Sub Gerencia de Defensa Civil'],     
            ['nombre_dependencia' => 'Gerencia de Asesoría Jurídica'],
            ['nombre_dependencia' => 'Gerencia de Planeamiento y Presupuesto'],
            ['nombre_dependencia' => 'Oficina de Programación e Inversiones'],       
        ];

        // Insertar los dependencia en la tabla 'dependencia'
        DB::table('dependencias')->insert($dependencia);
    }
}
