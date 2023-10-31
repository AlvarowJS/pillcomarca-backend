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
            
            
        ];


        DB::table('cargos')->insert($cargo);
    }
}
