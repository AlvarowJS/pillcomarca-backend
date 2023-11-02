<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiaCategoria extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $noticia = [
            ['nombre_categoria' => 'Nota de prensa'],
            ['nombre_categoria' => 'Campaña'],
            ['nombre_categoria' => 'Comunicado'],
        ];
        DB::table('noticia_categorias')->insert($noticia);
    }
}
