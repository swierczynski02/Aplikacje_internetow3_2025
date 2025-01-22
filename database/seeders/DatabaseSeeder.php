<?php

namespace Database\Seeders;

use App\Models\Uzytkownik;
use App\Models\Film;
use App\Models\Projekcja;
use App\Models\Ocena;
use App\Models\Bilet;
use App\Models\Zamowienie;
use App\Models\SzczegolyZamowienia;
use App\Models\Pracownicy;
use Illuminate\Database\Seeder;
use App\Models\Rezerwacja;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Uzyskaj dostęp do obiektu Faker poprzez fabryki
        $faker = \Faker\Factory::create();
        
        // Tworzenie filmów i projekcji
        $filmy = Film::factory(5)->create();
        $uzytkownicy = Uzytkownik::factory(5)->create();

        foreach ($filmy as $film) {
            Projekcja::factory(3)->create(['film_id' => $film->id]);

            foreach ($uzytkownicy as $uzytkownik) {
                Ocena::factory()->create([
                    'film_id' => $film->id,
                    'uzytkownik_id' => $uzytkownik->id,
                ]);
                
                // Tworzenie biletu dla każdego użytkownika
                Bilet::factory()->create([
                    'klient_id' => $uzytkownik->id,
                    'projekcja_id' => $film->projekcje->random()->id,  // Losowo przypisujemy projekcję
                    'rodzaj_biletu' => $faker->randomElement(['normalny', 'ulgowy']),
                    'cena' => $faker->randomFloat(2, 10, 100),
                    'data_zakupu' => $faker->dateTime(),
                ]);
            }

            // Tworzenie zamówienia dla każdego użytkownika
            foreach ($uzytkownicy as $uzytkownik) {
                $zamowienie = Zamowienie::factory()->create([
                    'klient_id' => $uzytkownik->id,
                    'data_zamowienia' => $faker->dateTime(),
                    'cena_calkowita' => $faker->randomFloat(2, 50, 500),
                    'status' => $faker->randomElement(['oczekujące', 'zrealizowane']),
                    'status_platnosci' => $faker->randomElement(['oczekująca', 'zapłacona']),
                ]);
                
                // Tworzenie szczegółów zamówienia dla każdego zamówienia
                SzczegolyZamowienia::factory(2)->create([
                    'zamowienie_id' => $zamowienie->id,
                    'cena_calkowita' => $faker->randomFloat(2, 50, 500),
                ]);
            }
        }

        // Tworzenie pracowników
        foreach ($uzytkownicy as $uzytkownik) {
            Pracownicy::factory()->create([
                'uzytkownik_id' => $uzytkownik->id,
                'rola' => $faker->randomElement(['rejestracja', 'obsługa klienta']),
                'data_zatrudnienia' => $faker->date(),
            ]);
        }
        Rezerwacja::factory(10)->create(); // Tworzy 10 przykładowych rezerwacji
    }
}
