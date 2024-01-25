<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pc;

class PcFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pc::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'procesador' => $this->faker->word,
            'ram' => $this->faker->word,
            'almacenamiento' => $this->faker->word,
            'tipo' => $this->faker->word,
            'ip' => $this->faker->word,
            'cod_patrimonial' => $this->faker->word,
        ];
    }
}
