<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    use HasFactory;

    protected $fillable = ['klient_id', 'projekcja_id', 'rodzaj_biletu', 'cena', 'data_zakupu'];

    // Relacje
    public function klient()
    {
        return $this->belongsTo(Uzytkownik::class, 'klient_id');
    }

    public function projekcja()
    {
        return $this->belongsTo(Projektcja::class, 'projekcja_id');
    }
}
