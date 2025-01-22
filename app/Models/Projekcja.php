<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekcja extends Model
{
    use HasFactory;
    protected $table = 'projekcje';

    protected $fillable = [
        'film_id',
        'data_czas',
        'sala',
        'dostępność_miejsc',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
};
