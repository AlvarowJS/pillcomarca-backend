<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SeguridadColeccion;
use App\Models\Seguridad_archivo;

class SeguridadArchivoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeguridadArchivo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_archivo' => $this->faker->word,
            'documento' => $this->faker->text,
            'seguridad_coleccion_id' => SeguridadColeccion::factory(),
        ];
    }
}
