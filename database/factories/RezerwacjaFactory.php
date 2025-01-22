<?php

namespace Database\Factories;

use App\Models\Rezerwacja;
use App\Models\Uzytkownik;
use App\Models\Projekcja;
use Illuminate\Database\Eloquent\Factories\Factory;

class RezerwacjaFactory extends Factory
{
    protected $model = Rezerwacja::class;

    public function definition()
    {
        return [
            'klient_id' => Uzytkownik::factory(),
            'projekcja_id' => Projekcja::factory(),
            'numer_miejsca' => $this->faker->numberBetween(1, 100),
            'data_rezerwacji' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(['oczekująca', 'potwierdzona', 'odwołana']),
            'data_waznosci' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
