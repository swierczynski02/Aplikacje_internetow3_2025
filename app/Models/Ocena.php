<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    use HasFactory;
    protected $table = 'oceny';

    protected $fillable = ['film_id', 'uzytkownik_id', 'ocena', 'komentarze'];

    // Relacja wiele do jednego z tabelą filmy
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    // Relacja wiele do jednego z tabelą uzytkownicy
    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class);
    }
};