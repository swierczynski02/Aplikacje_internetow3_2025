<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SzczegolyZamowienia extends Model
{
    use HasFactory;

    protected $fillable = [
        'zamowienie_id',
        'bilet_id',
        'ilosc',
        'cena',
        'cena_calkowita',
    ];

    public function zamowienie()
    {
        return $this->belongsTo(Zamowienie::class);
    }

    public function bilet()
    {
        return $this->belongsTo(Bilet::class);
    }
}
