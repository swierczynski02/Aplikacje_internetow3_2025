<?php

// app/Http/Controllers/PracownicyController.php
namespace App\Http\Controllers;

use App\Models\Pracownicy;
use App\Models\Uzytkownik; // Dodaj model Uzytkownik
use Illuminate\Http\Request;

class PracownicyController extends Controller
{
    // Wyświetlenie formularza do dodania pracownika
    public function create()
    {
        $uzytkownicy = Uzytkownik::all(); // Pobierz wszystkich użytkowników
        return view('pracownicy.create', compact('uzytkownicy'));
    }

    // Zapisanie nowego pracownika
    public function store(Request $request)
    {
        $request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'rola' => 'required|in:rejestracja,obsługa klienta',
            'data_zatrudnienia' => 'required|date',
        ]);

        Pracownicy::create($request->all());

        return redirect()->route('pracownicy.index')->with('success', 'Pracownik został dodany pomyślnie!');
    }

    // Wyświetlenie wszystkich pracowników
    public function index()
    {
        $pracownicy = Pracownicy::all();
        return view('pracownicy.index', compact('pracownicy'));
    }

    // Edycja pracownika
    // Metoda edycji w kontrolerze PracownicyController
public function edit($id)
{
    // Pobierz pracownika na podstawie ID
    $pracownik = Pracownicy::findOrFail($id);

    // Pobierz wszystkich użytkowników (zakładając, że model Uzytkownik ma dane użytkowników)
    $uzytkownicy = Uzytkownik::all();

    // Przekaż dane do widoku
    return view('pracownicy.edit', compact('pracownik', 'uzytkownicy'));
}


    // Aktualizacja danych pracownika
    public function update(Request $request, $id)
    {
        $request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'rola' => 'required|in:rejestracja,obsługa klienta',
            'data_zatrudnienia' => 'required|date',
        ]);

        $pracownik = Pracownicy::findOrFail($id);
        $pracownik->update($request->all());

        return redirect()->route('pracownicy.index')->with('success', 'Pracownik został zaktualizowany!');
    }

    // Usunięcie pracownika
    public function destroy($id)
    {
        Pracownicy::destroy($id);
        return redirect()->route('pracownicy.index')->with('success', 'Pracownik został usunięty!');
    }
}
