<?php
// app/database/migrations/xxxx_xx_xx_xxxxxx_create_pracownicy_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pracownicy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uzytkownik_id'); // Klucz obcy do tabeli uzytkownicy
            $table->enum('rola', ['rejestracja', 'obsługa klienta']); // Rola pracownika
            $table->date('data_zatrudnienia'); // Data zatrudnienia
            $table->timestamps();

            // Klucz obcy
            $table->foreign('uzytkownik_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pracownicy');
    }
};
