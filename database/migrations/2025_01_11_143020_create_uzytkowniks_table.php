<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uzytkownicy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_uzytkownika')->unique();
            $table->string('haslo');
            $table->string('email')->unique();
            $table->enum('rola', ['administrator', 'klient', 'pracownik']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uzytkownicy');
    }
};
