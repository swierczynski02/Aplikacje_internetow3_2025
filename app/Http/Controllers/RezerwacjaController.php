<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacja;
use Illuminate\Http\Request;

class RezerwacjaController extends Controller
{
    public function index()
    {
        $rezerwacje = Rezerwacja::all();
        return view('rezerwacje.index', compact('rezerwacje'));
    }

    public function create()
    {
        $uzytkownicy = \App\Models\Uzytkownik::all();
        $projekcje = \App\Models\Projekcja::all();
        return view('rezerwacje.create', compact('uzytkownicy', 'projekcje'));
    }

    // Metoda zapisująca nową rezerwację
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'projekcja_id' => 'required|exists:projekcje,id',
            'numer_miejsca' => 'required|integer',
            'data_rezerwacji' => 'required|date',
            'status' => 'required|in:oczekująca,potwierdzona,odwołana',
            'data_waznosci' => 'required|date',
        ]);

        $rezerwacja = Rezerwacja::create($validatedData);
        return redirect()->route('rezerwacje.index')->with('success', 'Rezerwacja została dodana.');
    }

    public function show($id)
    {
        $rezerwacja = Rezerwacja::findOrFail($id);
        return response()->json($rezerwacja);
    }

    public function edit($id)
{
    // Pobierz rezerwację do edytowania
    $rezerwacja = Rezerwacja::findOrFail($id);
    
    // Przekształć daty na obiekty Carbon
    $rezerwacja->data_rezerwacji = \Carbon\Carbon::parse($rezerwacja->data_rezerwacji);
    $rezerwacja->data_waznosci = \Carbon\Carbon::parse($rezerwacja->data_waznosci);

    // Pobierz wszystkich użytkowników i projekcje do formularza
    $uzytkownicy = \App\Models\Uzytkownik::all();
    $projekcje = \App\Models\Projekcja::all();

    return view('rezerwacje.edit', compact('rezerwacja', 'uzytkownicy', 'projekcje'));
}


public function update(Request $request, $id)
{
    // Walidacja danych wejściowych
    $validatedData = $request->validate([
        'klient_id' => 'required|exists:uzytkownicy,id',
        'projekcja_id' => 'required|exists:projekcje,id',
        'numer_miejsca' => 'required|integer',
        'data_rezerwacji' => 'required|date',
        'status' => 'required|in:oczekująca,potwierdzona,odwołana',
        'data_waznosci' => 'required|date',
    ]);

    // Znajdź rezerwację
    $rezerwacja = Rezerwacja::findOrFail($id);
    // Zaktualizuj dane rezerwacji
    $rezerwacja->update($validatedData);

    // Przekieruj z komunikatem o sukcesie
    return redirect()->route('rezerwacje.index')->with('success', 'Rezerwacja została zaktualizowana.');
}


    public function destroy($id)
    {
        $rezerwacja = Rezerwacja::findOrFail($id);
        $rezerwacja->delete();
        return response()->json(null, 204);
    }
    
}
