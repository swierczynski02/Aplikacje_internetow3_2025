<?php

namespace App\Http\Controllers;

use App\Models\Bilet;
use Illuminate\Http\Request;

class BiletController extends Controller
{
    public function index()
    {
        $bilety = Bilet::all();
        $projekcje = \App\Models\Projekcja::all();
        return view('bilety.index', compact('bilety'));
    }

    public function create()
    {
        $projekcje = \App\Models\Projekcja::all(); // Pobranie projekcji, jeśli masz model Projekcja
        $uzytkownicy = \App\Models\Uzytkownik::all(); // Pobranie użytkowników (klientów)
        return view('bilety.create', compact('projekcje', 'uzytkownicy'));
    }

    // Przechwycenie danych z formularza i zapis do bazy
    public function store(Request $request)
    {
        $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'projekcja_id' => 'required|exists:projekcje,id',
            'rodzaj_biletu' => 'required|string',
            'cena' => 'required|numeric',
            'data_zakupu' => 'required|date',
        ]);

        // Tworzenie nowego biletu
        Bilet::create($request->all());

        return redirect()->route('bilety.index')->with('success', 'Bilet został pomyślnie dodany!');
    }
    

    public function show($id)
    {
        $bilet = Bilet::findOrFail($id);
        return response()->json($bilet);
    }

    public function edit($id)
    {
        $bilet = Bilet::findOrFail($id);
        $projekcje = \App\Models\Projekcja::all();  // Pobranie projekcji
        $uzytkownicy = \App\Models\Uzytkownik::all(); // Pobranie użytkowników
        return view('bilety.edit', compact('bilet', 'projekcje', 'uzytkownicy')); // Przekazanie projekcji i użytkowników do widoku
    
    }

    public function update(Request $request, $id)
    {
        $bilet = Bilet::findOrFail($id);
    
        // Walidacja danych
        $request->validate([
            'rodzaj_biletu' => 'required|string',
            'cena' => 'required|numeric',
            'data_zakupu' => 'required|date',
            
        ]);
    
        // Aktualizacja danych biletu
        $bilet->update([
            'rodzaj_biletu' => $request->rodzaj_biletu,
            'cena' => $request->cena,
            'data_zakupu' => $request->data_zakupu,
            
        ]);
    
        return redirect()->route('bilety.index')->with('success', 'Bilet został pomyślnie zaktualizowany!');
    }

    public function destroy($id)
{
    $bilet = Bilet::findOrFail($id); // Wyszukiwanie biletu
    $bilet->delete(); // Usuwanie biletu

    // Przekierowanie do widoku z komunikatem sukcesu
    return redirect()->route('bilety.index')->with('success', 'Bilet został usunięty!');
}




}
