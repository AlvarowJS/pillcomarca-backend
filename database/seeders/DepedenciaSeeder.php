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
            ['nombre_dependencia' => 'Área de Estadistica e Informática', 'estado' => true],
            ['nombre_dependencia' => 'Oficina de Control Institucional', 'estado' => true],
            ['nombre_dependencia' => 'Procuraduria Pública Municipal', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Secretaria General', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Imagen Institucional', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Orientación y Trámite Documentario', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia Archivo Municipal', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Administración', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Recursos Humanos', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Tesorería', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Contabilidad', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Logística', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Administración Tributaria', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Recaudación Tributaria', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Fiscalización Tributaria', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Ejecución Coactivo', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Desarrollo Social y Económico', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Social y Bienestar', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Registro Civil', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Económico', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Seguridad Ciudadana e Institucional', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de DEMUNA', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Medio Ambiente', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Limpieza Pública', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Parques y Jardines', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Infraestructura y Desarrollo Territorial', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Estudios y Proyectos', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Obras y Liquidaciones', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Desarrollo Urbano, Rural y Catastro', 'estado' => true],
            ['nombre_dependencia' => 'Sub Gerencia de Defensa Civil', 'estado' => true],     
            ['nombre_dependencia' => 'Gerencia de Asesoría Jurídica', 'estado' => true],
            ['nombre_dependencia' => 'Gerencia de Planeamiento y Presupuesto', 'estado' => true],
            ['nombre_dependencia' => 'Oficina de Programación e Inversiones', 'estado' => true], 
            ['nombre_dependencia' => 'Alcaldia', 'estado' => true],  
            ['nombre_dependencia' => 'Gerencia Municipal', 'estado' => true],    
        ];

        // Insertar los dependencia en la tabla 'dependencia'
        DB::table('dependencias')->insert($dependencia);
    }
}
