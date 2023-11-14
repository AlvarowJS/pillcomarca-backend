<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Portada;
use App\Models\User;

class PortadaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portada::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_portada' => $this->faker->word,
            'foto' => $this->faker->text,
            'estado' => $this->faker->boolean,
            'user_id' => User::factory(),
        ];
    }
}
