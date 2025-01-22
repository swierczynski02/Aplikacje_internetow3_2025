<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projekcje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade'); // Klucz obcy do tabeli filmy
            $table->dateTime('data_czas'); // Data i godzina projekcji
            $table->string('sala'); // Sala kinowa
            $table->integer('dostępność_miejsc'); // Liczba dostępnych miejsc
            $table->timestamps(); // data_utworzenia i data_modyfikacji
        });
    }

    public function down()
    {
        Schema::dropIfExists('projekcje');
    }
};

