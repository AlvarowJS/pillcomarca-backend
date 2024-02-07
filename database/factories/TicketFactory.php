<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hardware;
use App\Models\Ticket;
use App\Models\User;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detalle' => $this->faker->word,
            'estado' => $this->faker->word,
            'fecha' => $this->faker->date(),
            'fecha_atencion' => $this->faker->date(),
            'fecha_conclu' => $this->faker->date(),
            'conclusion' => $this->faker->word,
            'urgencia' => $this->faker->word,
            'urgencia_verdad' => $this->faker->word,
            'hora' => $this->faker->time(),
            'hora_atencion' => $this->faker->time(),
            'hora_conclu' => $this->faker->time(),
            'user_id' => User::factory(),
            'hardware_id' => Hardware::factory(),
        ];
    }
}
