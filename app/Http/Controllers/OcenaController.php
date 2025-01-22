<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Models\Film;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class OcenaController extends Controller
{
    // Wyświetlenie listy ocen
    public function index()
    {
        $oceny = Ocena::with('film', 'uzytkownik')->get();
        return view('oceny.index', compact('oceny'));
    }

    // Wyświetlenie formularza do dodania nowej oceny
    public function create()
    {
        $filmy = Film::all();
        $uzytkownicy = Uzytkownik::all();
        return view('oceny.create', compact('filmy', 'uzytkownicy'));
    }

    // Zapisanie nowej oceny
    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:filmy,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'ocena' => 'required|integer|min:1|max:10',
            'komentarze' => 'nullable|string|max:1000',
        ]);

        Ocena::create($validated);
        return redirect()->route('oceny.index')->with('success', 'Ocena została dodana.');
    }

    // Wyświetlenie formularza do edycji oceny
    
    public function edit($id)
    {
        // Znajdowanie filmu po ID
        $film = Film::findOrFail($id);

        // Zwracanie widoku edycji z danymi filmu
        return view('filmy.edit', compact('film'));
    }

    // Zaktualizowanie danych filmu
    public function update(Request $request, $id)
    {
        // Walidacja danych
        $validated = $request->validate([
            'tytul' => 'required|string|max:255',
            'gatunek' => 'required|string|max:255',
            'rezyser' => 'required|string|max:255',
            'rok_produkcji' => 'required|integer|min:1900|max:2100',
        ]);

        // Znajdowanie filmu po ID
        $film = Film::findOrFail($id);

        // Aktualizacja danych
        $film->update($validated);

        // Przekierowanie po zapisaniu z komunikatem
        return redirect()->route('filmy.index')->with('success', 'Film został zaktualizowany.');
    }


    



public function destroy(Ocena $ocena)
{
    // Usunięcie oceny
    $ocena->delete();

    // Przekierowanie po usunięciu z komunikatem
    return redirect()->route('oceny.index')->with('success', 'Ocena została usunięta.');
}

}
