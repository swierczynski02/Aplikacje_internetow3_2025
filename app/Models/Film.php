<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory; // Dodaj tę linię, aby używać fabryk

    protected $table = 'filmy';

    protected $fillable = [
        'tytul',
        'gatunek',
        'rezyser',
        'rok_produkcji',
        'czas_trwania',
        'opis',
    ];
    // Relacja jeden do wielu z tabelą projekcje
    public function projekcje()
{
    return $this->hasMany(Projekcja::class, 'film_id');
}


    // Relacja jeden do wielu z tabelą oceny
    public function oceny()
    {
        return $this->hasMany(Ocena::class);
    }
}
