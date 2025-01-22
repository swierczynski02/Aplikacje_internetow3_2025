<?php
namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class UzytkownikController extends Controller
{
    // Funkcja do wyświetlania listy użytkowników
    public function index()
    {
        $uzytkownicy = Uzytkownik::all(); // Pobieranie wszystkich użytkowników
        return view('uzytkownicy.index', compact('uzytkownicy'));
    }

    // Funkcja do tworzenia nowego użytkownika
    public function create()
    {
        return view('uzytkownicy.create');
    }

    // Funkcja do zapisywania nowego użytkownika w bazie
    public function store(Request $request)
    {
        // Walidacja danych formularza
        $validated = $request->validate([
            'nazwa_uzytkownika' => 'required|string|max:255',
            'haslo' => 'required|string|min:8|confirmed',
            'email' => 'required|email|unique:uzytkownicy,email',
            'rola' => 'required|string|in:administrator,klient,pracownik',
        ]);

        // Tworzenie nowego użytkownika w bazie danych
        Uzytkownik::create([
            'nazwa_uzytkownika' => $validated['nazwa_uzytkownika'],
            'email' => $validated['email'],
            'haslo' => bcrypt($validated['haslo']),
            'rola' => $validated['rola'],
        ]);

        // Przekierowanie do listy użytkowników z komunikatem o sukcesie
        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik został dodany.');
    }

    // Funkcja do edytowania użytkownika
    public function edit($id)
    {
        $uzytkownik = Uzytkownik::findOrFail($id); // Pobierz użytkownika do edytowania
        return view('uzytkownicy.edit', compact('uzytkownik')); // Przekaż dane użytkownika do widoku
    }

    // Funkcja do aktualizowania użytkownika
    public function update(Request $request, $id)
    {
        $uzytkownik = Uzytkownik::findOrFail($id);

        // Walidacja danych formularza
        $validated = $request->validate([
            'nazwa_uzytkownika' => 'required|string|max:255',
            'email' => 'required|email|unique:uzytkownicy,email,' . $uzytkownik->id,
            'rola' => 'required|string|in:administrator,klient,pracownik',
            'haslo' => 'nullable|string|min:8|confirmed',
        ]);

        // Jeśli hasło zostało zmienione, zaktualizuj je
        if ($request->has('haslo')) {
            $validated['haslo'] = bcrypt($validated['haslo']);
        }

        // Aktualizacja użytkownika
        $uzytkownik->update($validated);

        // Przekierowanie do listy użytkowników z komunikatem o sukcesie
        return redirect()->route('uzytkownicy.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }

    // Funkcja do usuwania użytkownika
    public function destroy(Uzytkownik $uzytkownik)
    {
        // Usunięcie użytkownika
        $uzytkownik->delete();

        // Przekierowanie po usunięciu z komunikatem
        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik został usunięty!');
    }
}

