<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Registro_visita;
use App\Models\User;
use App\Models\UsuarioPublico;

class RegistroVisitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RegistroVisita::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'asunto' => $this->faker->text,
            'oficina' => $this->faker->text,
            'hora_ingreso' => $this->faker->dateTime(),
            'hora_salida' => $this->faker->dateTime(),
            'user_id' => User::factory(),
            'usuario_publico_id' => UsuarioPublico::factory(),
        ];
    }
}
