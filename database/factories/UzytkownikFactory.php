<?php

namespace Database\Factories;

use App\Models\Uzytkownik;
use Illuminate\Database\Eloquent\Factories\Factory;

class UzytkownikFactory extends Factory
{
    protected $model = Uzytkownik::class;

    public function definition()
    {
        return [
            'nazwa_uzytkownika' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'haslo' => bcrypt('password'), // Automatycznie zaszyfrowane hasło
            'rola' => $this->faker->randomElement(['administrator', 'klient', 'pracownik']),
        ];
    }
}
