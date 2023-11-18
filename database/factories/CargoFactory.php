<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cargo;

class CargoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cargo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_cargo' => $this->faker->word,
            'estado' => $this->faker->boolean,
        ];
    }
}
