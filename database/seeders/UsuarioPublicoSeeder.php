<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsuarioPublicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'GEREMIAS NINFA', 'apellidos' => 'ABAD CASIMIRO', 'dni' => '22724883', 'persona' => 'Persona natural']            
        ];
        DB::table('usuario_publicos')->insert($data);
    }
}
