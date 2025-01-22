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
        Schema::create('rezerwacje', function (Blueprint $table) {
            $table->id(); // Unikalny identyfikator rezerwacji
            $table->unsignedBigInteger('klient_id'); // Klucz obcy do tabeli uzytkownicy
            $table->unsignedBigInteger('projekcja_id'); // Klucz obcy do tabeli projekcje
            $table->integer('numer_miejsca'); // Numer miejsca w sali kinowej
            $table->dateTime('data_rezerwacji'); // Data i godzina dokonania rezerwacji
            $table->enum('status', ['oczekująca', 'potwierdzona', 'odwołana']); // Status rezerwacji
            $table->dateTime('data_waznosci'); // Data do kiedy rezerwacja jest ważna
            $table->timestamps(); // Data i godzina utworzenia rezerwacji

            // Klucz obcy do tabeli uzytkownicy
            $table->foreign('klient_id')->references('id')->on('uzytkownicy')->onDelete('cascade');

            // Klucz obcy do tabeli projekcje
            $table->foreign('projekcja_id')->references('id')->on('projekcje')->onDelete('cascade');
        });
    }

    /**
     * Cofnij migrację.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezerwacje');
    }
};
