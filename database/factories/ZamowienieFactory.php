<?php

namespace Database\Factories;

use App\Models\Zamowienie;
use App\Models\Uzytkownik;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZamowienieFactory extends Factory
{
    protected $model = Zamowienie::class;

    public function definition()
    {
        return [
            'klient_id' => Uzytkownik::factory(),
            'data_zamowienia' => $this->faker->dateTime(),
            'cena_calkowita' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['oczekujące', 'zrealizowane']),
            'status_platnosci' => $this->faker->randomElement(['oczekująca', 'zapłacona']),
        ];
    }
}
