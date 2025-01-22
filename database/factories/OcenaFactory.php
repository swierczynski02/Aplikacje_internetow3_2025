<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Ocena;
use App\Models\Uzytkownik;
use Illuminate\Database\Eloquent\Factories\Factory;

class OcenaFactory extends Factory
{
    protected $model = Ocena::class;

    public function definition()
    {
        return [
            'film_id' => Film::factory(),
            'uzytkownik_id' => Uzytkownik::factory(),
            'ocena' => $this->faker->numberBetween(1, 10),
            'komentarze' => $this->faker->sentence(),
        ];
    }
}
