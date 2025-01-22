<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchom migrację.
     */
    public function up(): void
    {
        Schema::create('szczegoly_zamowienias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zamowienie_id'); // Klucz obcy do tabeli zamowienie
            $table->unsignedBigInteger('bilet_id'); // Klucz obcy do tabeli bilety
            $table->integer('ilosc'); // Liczba biletów
            $table->decimal('cena', 8, 2); // Cena jednostkowa
            $table->decimal('cena_calkowita', 8, 2); // Całkowita cena
            $table->timestamps();

            // Klucze obce
            $table->foreign('zamowienie_id')->references('id')->on('zamowienies')->onDelete('cascade');
            $table->foreign('bilet_id')->references('id')->on('bilets')->onDelete('cascade');
            
            // Dodaj indeksy na kluczach obcych
            $table->index('zamowienie_id');
            $table->index('bilet_id');
        });
    }

    /**
     * Cofnij migrację.
     */
    public function down(): void
    {
        Schema::dropIfExists('szczegoly_zamowienias');
    }
};
