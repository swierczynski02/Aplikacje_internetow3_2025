<?php

// database/factories/PracownicyFactory.php

namespace Database\Factories;

use App\Models\Pracownicy;
use App\Models\Uzytkownik;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracownicyFactory extends Factory
{
    protected $model = Pracownicy::class;

    public function definition()
    {
        return [
            'uzytkownik_id' => Uzytkownik::factory(),
            'rola' => $this->faker->randomElement(['rejestracja', 'obsługa klienta']),
            'data_zatrudnienia' => $this->faker->date(),
        ];
    }
}

