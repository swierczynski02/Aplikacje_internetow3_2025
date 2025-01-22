<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bilety', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klient_id');
            $table->unsignedBigInteger('projekcja_id');
            $table->enum('rodzaj_biletu', ['normalny', 'ulgowy']);
            $table->decimal('cena', 8, 2);
            $table->dateTime('data_zakupu');
            $table->timestamps();

            // Klucze obce
            $table->foreign('klient_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
            $table->foreign('projekcja_id')->references('id')->on('projekcje')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bilety');
    }
};
