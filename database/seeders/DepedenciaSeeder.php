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
        ];

        // Insertar los dependencia en la tabla 'dependencia'
        DB::table('dependencias')->insert($dependencia);
    }
}
