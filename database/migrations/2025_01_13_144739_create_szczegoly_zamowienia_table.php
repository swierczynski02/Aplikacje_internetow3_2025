<?php

// app/database/migrations/xxxx_xx_xx_xxxxxx_create_szczegoly_zamowienia_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('szczegoly_zamowienia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zamowienie_id'); // Klucz obcy do tabeli zamowienie
            $table->unsignedBigInteger('bilet_id'); // Klucz obcy do tabeli bilety
            $table->integer('ilosc'); // Liczba biletów
            $table->decimal('cena', 8, 2); // Cena jednostkowa
            $table->decimal('cena_calkowita', 8, 2); // Całkowita cena
            $table->timestamps();

            // Klucze obce
            $table->foreign('zamowienie_id')->references('id')->on('zamowienia')->onDelete('cascade');
            $table->foreign('bilet_id')->references('id')->on('bilets')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('szczegoly_zamowienia');
    }
};
