<?php

namespace App\Http\Controllers;

use App\Models\Projekcja;
use App\Models\Film;
use Illuminate\Http\Request;

class ProjekcjaController extends Controller
{
    public function index()
    {
        $projekcje = Projekcja::with('film')->get();
        return view('projekcje.index', compact('projekcje'));
    }

    public function create()
    {
        $filmy = Film::all();
        return view('projekcje.create', compact('filmy'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:filmy,id',
            'data_czas' => 'required|date',
            'sala' => 'required|string|max:255',
            'dostępność_miejsc' => 'required|integer',
        ]);

        Projekcja::create($validated);
        return redirect()->route('projekcje.index')->with('success', 'Projekcja została dodana.');
    }

    public function edit($id)
{
    // Pobierz projekcję do edytowania
    $projekcja = Projekcja::findOrFail($id);

    // Pobierz wszystkie filmy, które można wybrać w formularzu
    $filmy = Film::all();

    return view('projekcje.edit', compact('projekcja', 'filmy'));
}

public function update(Request $request, $id)
{
    // Walidacja danych wejściowych
    $validated = $request->validate([
        'film_id' => 'required|exists:filmy,id',
        'data_czas' => 'required|date',
        'sala' => 'required|string|max:255',
        'dostępność_miejsc' => 'required|integer',
    ]);

    // Znajdź projekcję
    $projekcja = Projekcja::findOrFail($id);

    // Zaktualizuj dane projekcji
    $projekcja->update($validated);

    // Przekieruj z komunikatem sukcesu
    return redirect()->route('projekcje.index')->with('success', 'Projekcja została zaktualizowana.');
}


    public function destroy(Projekcja $projekcja)
    {
        // Usunięcie projekcji
        $projekcja->delete();
    
        // Przekierowanie po usunięciu z komunikatem
        return redirect()->route('projekcje.index')->with('success', 'Projekcja została usunięta.');
    }
    

}
