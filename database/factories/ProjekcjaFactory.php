<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Projekcja;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjekcjaFactory extends Factory
{
    protected $model = Projekcja::class;

    public function definition()
    {
        return [
            'film_id' => \App\Models\Film::factory(), // Powiązanie z filmem
            'data_czas' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'sala' => $this->faker->randomElement(['Sala 1', 'Sala 2', 'Sala 3']),
            'dostępność_miejsc' => $this->faker->numberBetween(50, 200),
        ];
    }
}
