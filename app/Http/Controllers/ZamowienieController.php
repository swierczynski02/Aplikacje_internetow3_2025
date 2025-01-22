<?php
namespace App\Http\Controllers;

use App\Models\Zamowienie;
use App\Models\Uzytkownik; // Zakładając, że mamy model Uzytkownik
use Illuminate\Http\Request;

class ZamowienieController extends Controller
{
    // Metoda wyświetlająca formularz dodawania nowego zamówienia
    public function create()
    {
        // W przypadku, gdy masz model użytkownika
        $uzytkownicy = Uzytkownik::all(); 
        return view('zamowienia.create', compact('uzytkownicy'));
    }

    // Metoda zapisująca nowe zamówienie
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'data_zamowienia' => 'required|date',
            'cena_calkowita' => 'required|numeric',
            'status' => 'required|string',
            'status_platnosci' => 'required|string',
        ]);

        // Tworzenie nowego zamówienia w bazie danych
        $zamowienie = Zamowienie::create($validatedData);

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało dodane.');
    }

    // Pozostałe metody (show, update, destroy)
    public function index()
    {
        $zamowienia = Zamowienie::all();
        return view('zamowienia.index', compact('zamowienia'));
    }

    public function show($id)
    {
        $zamowienie = Zamowienie::findOrFail($id);
        return response()->json($zamowienie);
    }

    public function edit($id)
    {
        // Pobranie zamówienia na podstawie jego ID
        $zamowienie = Zamowienie::findOrFail($id);
        
        // Pobranie wszystkich użytkowników
        $uzytkownicy = Uzytkownik::all();
        
        // Przekazanie danych do widoku
        return view('zamowienia.edit', compact('zamowienie', 'uzytkownicy'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'data_zamowienia' => 'required|date',
            'cena_calkowita' => 'required|numeric',
            'status' => 'required|string',
            'status_platnosci' => 'required|string',
        ]);
    
        // Pobranie zamówienia z bazy danych
        $zamowienie = Zamowienie::findOrFail($id);
        
        // Aktualizacja zamówienia
        $zamowienie->update($validatedData);
    
        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało zaktualizowane.');
    }
    

    public function destroy($id)
{
    // Znajdź zamówienie lub wyrzuć wyjątek, jeśli nie istnieje
    $zamowienie = Zamowienie::findOrFail($id);

    // Usunięcie zamówienia
    $zamowienie->delete();

    // Przekierowanie z komunikatem o sukcesie
    return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało usunięte!');
}


}
