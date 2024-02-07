<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hardware;

class HardwareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hardware::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'procesador' => $this->faker->word,
            'ram' => $this->faker->word,
            'almacenamiento' => $this->faker->word,
            'tipo_alma' => $this->faker->word,
            'ip' => $this->faker->word,
            'marca' => $this->faker->word,
            'especif' => $this->faker->word,
            'cod_patri' => $this->faker->word,
        ];
    }
}
