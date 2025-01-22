<?php

// database/factories/SzczegolyZamowieniaFactory.php

namespace Database\Factories;

use App\Models\SzczegolyZamowienia;
use App\Models\Bilet;
use App\Models\Zamowienie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SzczegolyZamowieniaFactory extends Factory
{
    protected $model = SzczegolyZamowienia::class;

    public function definition()
    {
        return [
            'zamowienie_id' => Zamowienie::factory(),
            'bilet_id' => Bilet::factory(),
            'ilosc' => $this->faker->numberBetween(1, 5),
            'cena' => $this->faker->randomFloat(2, 10, 100),
            'cena_calkowita' => function (array $attributes) {
                return $attributes['ilosc'] * $attributes['cena'];
            },
        ];
    }
}

