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
        Schema::create('pracownicies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uzytkownik_id'); // Klucz obcy do tabeli uzytkownicy
            $table->string('rola'); // Rola pracownika
            $table->date('data_zatrudnienia'); // Data zatrudnienia
            $table->timestamps();

            // Klucz obcy do tabeli uzytkownicy
            $table->foreign('uzytkownik_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
        });
    }

    /**
     * Cofnij migrację.
     */
    public function down(): void
    {
        Schema::dropIfExists('pracownicies');
    }
};
