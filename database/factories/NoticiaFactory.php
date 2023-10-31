<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->word,
            'fecha' => $this->faker->date(),
            'nota' => $this->faker->text,
            'referendcia' => $this->faker->text,
            'user_id' => User::factory(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}
