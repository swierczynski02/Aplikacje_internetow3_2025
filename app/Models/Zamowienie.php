<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamowienie extends Model
{
    use HasFactory;

    protected $fillable = ['klient_id', 'data_zamowienia', 'cena_calkowita', 'status', 'status_platnosci'];

    // Relacja
    public function klient()
    {
        return $this->belongsTo(Uzytkownik::class, 'klient_id');
    }

    public function szczegolyZamowienia()
    {
        return $this->hasMany(SzczegolyZamowienia::class, 'zamowienie_id');
    }
}

