<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Noticia_imagenes;

class NoticiaImagenesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NoticiaImagenes::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'imagen' => $this->faker->text,
        ];
    }
}
