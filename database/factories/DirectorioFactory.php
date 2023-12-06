<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Directorio;

class DirectorioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Directorio::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'apellidos' => $this->faker->word,
            'dni' => $this->faker->word,
            'correo' => $this->faker->word,
            'cargo' => $this->faker->word,
            'dependencia' => $this->faker->word,
            'estado' => $this->faker->boolean,
        ];
    }
}
