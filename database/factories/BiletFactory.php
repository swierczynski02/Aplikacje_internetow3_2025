<?php

namespace Database\Factories;

use App\Models\Bilet;
use App\Models\Uzytkownik;
use App\Models\Projekcja;
use Illuminate\Database\Eloquent\Factories\Factory;

class BiletFactory extends Factory
{
    protected $model = Bilet::class;

    public function definition()
    {
        return [
            'klient_id' => Uzytkownik::factory(),
            'projekcja_id' => Projekcja::factory(),
            'rodzaj_biletu' => $this->faker->randomElement(['normalny', 'ulgowy']),
            'cena' => $this->faker->randomFloat(2, 10, 100),
            'data_zakupu' => $this->faker->dateTime(),
        ];
    }
}
