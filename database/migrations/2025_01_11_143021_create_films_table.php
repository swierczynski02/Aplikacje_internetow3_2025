<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filmy', function (Blueprint $table) {
            $table->id();
            $table->string('tytul');
            $table->string('gatunek');
            $table->string('rezyser');
            $table->year('rok_produkcji');
            $table->integer('czas_trwania');
            $table->text('opis')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('filmy');
    }
};
