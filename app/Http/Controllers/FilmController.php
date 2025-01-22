<?php
namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Wyświetlenie formularza do dodania filmu
    public function create()
    {
        return view('filmy.create'); // Form
    }

    // Zapisanie nowego filmu
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $validated = $request->validate([
            'tytul' => 'required|string|max:255',
            'gatunek' => 'required|in:komedia,dramat,horror,akcja',
            'rezyser' => 'required|string|max:255',
            'rok_produkcji' => 'required|integer',
            'czas_trwania' => 'required|integer',
            'opis' => 'nullable|string',
        ]);

        // Tworzenie nowego filmu
        Film::create($validated);

        // Przekierowanie do listy filmów z komunikatem sukcesu
        return redirect()->route('filmy.index')->with('success', 'Film został dodany!');
    }

    // Wyświetlenie wszystkich filmów
    public function index()
    {
        $filmy = Film::all();
        return view('filmy.index', compact('filmy'));
    }

    // Wyświetlanie formularza edycji filmu
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('filmy.edit', compact('film'));
    }

    // Zaktualizowanie filmu
    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        // Walidacja danych wejściowych
        $validated = $request->validate([
            'tytul' => 'required|string|max:255',
            'gatunek' => 'required|in:komedia,dramat,horror,akcja',
            'rezyser' => 'required|string|max:255',
            'rok_produkcji' => 'required|integer',
            'czas_trwania' => 'required|integer',
            'opis' => 'nullable|string',
        ]);

        // Aktualizacja filmu
        $film->update($validated);

        // Przekierowanie po edycji z komunikatem
        return redirect()->route('filmy.index')->with('success', 'Film został zaktualizowany!');
    }

    // Usuwanie filmu
    public function destroy(Film $film)
    {
        // Usunięcie filmu
        $film->delete();

        // Przekierowanie po usunięciu z komunikatem
        return redirect()->route('filmy.index')->with('success', 'Film został usunięty!');
    }
}

