<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'descripcion' => 'Administrador total','role_number' => '1'],
            ['name' => 'Alcalde', 'descripcion' => 'Tendra acceso a una agenda y otros','role_number' => '2'],
            ['name' => 'Gerente Municipal', 'descripcion' => 'Tendra acceso a una agenda y otros','role_number' => '3'],
            ['name' => 'Imagen', 'descripcion' => 'Tendra acceso a subir noticias y portadas','role_number' => '4'],
            ['name' => 'Recursos Humanos', 'descripcion' => 'Tendra acceso a emitir comunicados','role_number' => '5'],
            ['name' => 'Archivos', 'descripcion' => 'Podra subir archivos pdf por categoria','role_number' => '6'],
            ['name' => 'Guardia', 'descripcion' => 'Realizara el registro de visitas de la municipalidad','role_number' => '7'],
            ['name' => 'Usuario General', 'descripcion' => 'Podra emitir tickets de atencion y ver los comunicados','role_number' => '8'],
            // Agrega más roles si es necesario
        ];

        // Insertar los roles en la tabla 'roles'
        DB::table('roles')->insert($roles);
    }
}
