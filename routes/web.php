<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzytkownikController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProjekcjaController;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\BiletController;
use App\Http\Controllers\ZamowienieController;
use App\Http\Controllers\RezerwacjaController;
use App\Http\Controllers\PracownicyController;
use App\Http\Controllers\SzczegolyZamowieniaController;
use App\Http\Controllers\MainController;

// Strona główna
Route::get('/', [MainController::class, 'index'])->name('main.index');

// Trasy dla Użytkowników
Route::resource('uzytkownicy', UzytkownikController::class);


// Trasy dla Filmów
Route::resource('filmy', FilmController::class);
Route::get('filmy/{id}/edit', [FilmController::class, 'edit'])->name('filmy.edit');
Route::put('filmy/{id}', [FilmController::class, 'update'])->name('filmy.update');

// Trasy dla Projekcji
Route::resource('projekcje', ProjekcjaController::class);

// Trasy dla Ocen
Route::resource('oceny', OcenaController::class);



// Trasy dla Biletów
Route::resource('bilety', BiletController::class);
Route::get('/bilety/create', [BiletController::class, 'create'])->name('bilety.create');


// Trasy dla Zamówień
Route::resource('zamowienia', ZamowienieController::class);

// Trasy dla Rezerwacji
Route::resource('rezerwacje', RezerwacjaController::class);

// Trasy dla Pracowników
Route::resource('pracownicy', PracownicyController::class);

// Trasy dla Szczegółów Zamówienia
Route::resource('szczegolyZamowienia', SzczegolyZamowieniaController::class);
