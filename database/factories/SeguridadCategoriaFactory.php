<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Seguridad_categoria;

class SeguridadCategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeguridadCategoria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'categoria' => $this->faker->word,
        ];
    }
}
