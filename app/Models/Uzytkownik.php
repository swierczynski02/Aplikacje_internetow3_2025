<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Uzytkownik extends Authenticatable
{
    use HasFactory; // Dodaj tę linię, aby używać fabryk

    protected $table = 'uzytkownicy';

    protected $fillable = [
        'nazwa_uzytkownika',
        'haslo',
        'email',
        'rola',
    ];

    protected $hidden = [
        'haslo',
    ];

    // Automatyczne haszowanie hasła
    public function setPasswordAttribute($value)
    {
        $this->attributes['haslo'] = bcrypt($value);
    }
    // Relacja jeden do wielu z tabelą oceny
    public function oceny()
    {
        return $this->hasMany(Ocena::class);
    }
}
