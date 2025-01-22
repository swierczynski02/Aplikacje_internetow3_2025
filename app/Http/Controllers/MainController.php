<?php

namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use App\Models\Film;
use App\Models\Projekcja;
use App\Models\Ocena;
use App\Models\Bilet;
use App\Models\Zamowienie;
use App\Models\Rezerwacja;
use App\Models\Pracownicy;
use App\Models\SzczegolyZamowienia;

class MainController extends Controller
{
    /**
     * Wyświetl główną stronę z danymi ze wszystkich tabel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Pobierz dane z wszystkich tabel
        $uzytkownicy = Uzytkownik::all();
        $filmy = Film::all();
        $projekcje = Projekcja::all();
        $oceny = Ocena::all();
        $bilety = Bilet::all();
        $zamowienia = Zamowienie::all();
        $rezerwacje = Rezerwacja::all();
        $pracownicy = Pracownicy::all();
        $szczegolyZamowienia = SzczegolyZamowienia::all();

        // Zwróć widok z danymi
        return view('main.index', compact(
            'uzytkownicy', 
            'filmy', 
            'projekcje', 
            'oceny', 
            'bilety', 
            'zamowienia', 
            'rezerwacje', 
            'pracownicy', 
            'szczegolyZamowienia'
        ));
    }
}
