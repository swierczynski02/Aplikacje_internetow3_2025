<?php

namespace App\Http\Controllers;

use App\Models\SzczegolyZamowienia;
use Illuminate\Http\Request;

class SzczegolyZamowieniaController extends Controller
{
    // Wyświetlenie wszystkich szczegółów zamówienia
    public function index()
    {
        $szczegolyZamowienia = SzczegolyZamowienia::all();
        return view('szczegolyZamowienia.index', compact('szczegolyZamowienia'));
    }

   // Metoda wyświetlająca formularz tworzenia
public function create()
{
    $zamowienies = \App\Models\Zamowienie::all(); // Pobierz wszystkie zamówienia
    $bilets = \App\Models\Bilet::all(); // Pobierz wszystkie bilety
    return view('szczegolyZamowienia.create', compact('zamowienies', 'bilets'));

}

// Metoda zapisująca nowy rekord
public function store(Request $request)
{
    $request->validate([
        'zamowienie_id' => 'required|exists:zamowienies,id',
        'bilet_id' => 'required|exists:bilets,id',
        'ilosc' => 'required|integer',
        'cena' => 'required|numeric',
        'cena_calkowita' => 'required|numeric',
    ]);

    SzczegolyZamowienia::create($request->all());

    return redirect()->route('szczegolyZamowienia.index')->with('success', 'Nowy szczegół zamówienia został dodany.');
}

    // Wyświetlenie pojedynczego szczegółu zamówienia
    public function show($id)
    {
        return SzczegolyZamowienia::findOrFail($id);
    }

    public function edit($id)
{
    $szczegol = SzczegolyZamowienia::findOrFail($id);
    return view('szczegolyZamowienia.edit', compact('szczegol'));
}

// Metoda aktualizująca rekord
public function update(Request $request, $id)
{
    $request->validate([
        
        'ilosc' => 'required|integer',
        'cena' => 'required|numeric',
        'cena_calkowita' => 'required|numeric',
    ]);

    $szczegol = SzczegolyZamowienia::findOrFail($id);
    $szczegol->update($request->all());

    return redirect()->route('szczegolyZamowienia.index')->with('success', 'Szczegół zamówienia został zaktualizowany.');
}




    // Usunięcie szczegółu zamówienia
    public function destroy($id)
    {
        SzczegolyZamowienia::destroy($id);
        return response()->json(null, 204);
    }
}
