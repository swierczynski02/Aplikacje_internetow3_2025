<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('oceny', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade'); // Klucz obcy do tabeli filmy
            $table->foreignId('uzytkownik_id')->constrained('uzytkownicy')->onDelete('cascade'); // Klucz obcy do tabeli uzytkownicy
            $table->tinyInteger('ocena')->unsigned(); // Ocena filmu w skali 1-10
            $table->text('komentarze')->nullable(); // Komentarze użytkownika
            $table->timestamp('data_oceny')->useCurrent(); // Data oceny
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oceny');
    }
};
