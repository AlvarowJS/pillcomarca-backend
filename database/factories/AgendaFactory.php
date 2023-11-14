<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Agenda;
use App\Models\User;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'nombre_evento' => $this->faker->word,
            'hora_inicio' => $this->faker->date(),
            'hora_fin' => $this->faker->date(),
            'enlace' => $this->faker->word,
            'fullday' => $this->faker->boolean,
            'user_id' => User::factory(),
        ];
    }
}
