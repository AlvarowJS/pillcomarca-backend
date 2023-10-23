<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dependencia;

class DependenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dependencia::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_dependencia' => $this->faker->word,
        ];
    }
}
