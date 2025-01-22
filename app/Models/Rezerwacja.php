<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezerwacja extends Model
{
    use HasFactory;

    protected $table = 'rezerwacje';

    protected $fillable = [
        'klient_id',
        'projekcja_id',
        'numer_miejsca',
        'data_rezerwacji',
        'status',
        'data_waznosci',
    ];

    /**
     * Relacja z modelem Uzytkownik (klient).
     */
    public function klient()
    {
        return $this->belongsTo(Uzytkownik::class, 'klient_id');
    }

    /**
     * Relacja z modelem Projekcja.
     */
    public function projekcja()
    {
        return $this->belongsTo(Projekcja::class, 'projekcja_id');
    }
}
