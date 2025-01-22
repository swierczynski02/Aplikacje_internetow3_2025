<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        return [
            'tytul' => $this->faker->sentence,
            'gatunek' => $this->faker->randomElement(['komedia', 'dramat', 'horror', 'akcja']),
            'rezyser' => $this->faker->name,
            'rok_produkcji' => $this->faker->year,
            'czas_trwania' => $this->faker->numberBetween(90, 180), // Czas trwania w minutach
            'opis' => $this->faker->paragraph,
        ];
    }
}
