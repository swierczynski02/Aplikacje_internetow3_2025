<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Bilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">
    <h1>Dodaj Nowy Bilet</h1>
    <a href="{{ route('bilety.index') }}" class="btn btn-secondary mb-3">Powrót do listy biletów</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bilety.store') }}" method="POST">
        @csrf

        <!-- Wybór klienta -->
        <div class="form-group">
            <label for="klient_id">Klient:</label>
            <select name="klient_id" id="klient_id" class="form-control" required>
                <option value="">Wybierz klienta</option>
                @foreach($uzytkownicy as $uzytkownik)
                    <option value="{{ $uzytkownik->id }}">{{ $uzytkownik->nazwa_uzytkownika }}</option>
                @endforeach
            </select>
        </div>

        <!-- Wybór projekcji -->
        <div class="form-group">
            <label for="projekcja_id">Projekcja:</label>
            <select name="projekcja_id" id="projekcja_id" class="form-control" required>
                <option value="">Wybierz projekcję</option>
                @foreach($projekcje as $projekcja)
                    <option value="{{ $projekcja->id }}">{{ $projekcja->nazwa_projekcji }}</option>
                @endforeach
            </select>
        </div>

        <!-- Wybór rodzaju biletu -->
        <div class="mb-3">
                <label for="rodzaj_biletu" class="form-label">Rodzaj biletu</label>
                <select class="form-control" id="rodzaj_biletu" name="rodzaj_biletu" required>
                    <option value="normalny" {{ old('rodzaj_biletu', $bilet->rodzaj_biletu ?? '') == 'normalny' ? 'selected' : '' }}>Normalny</option>
                    <option value="ulgowy" {{ old('rodzaj_biletu', $bilet->rodzaj_biletu ?? '') == 'ulgowy' ? 'selected' : '' }}>Ulgowy</option>
                </select>
            </div>

        <!-- Wprowadzenie ceny -->
        <div class="form-group">
            <label for="cena">Cena:</label>
            <input type="number" step="0.01" name="cena" id="cena" class="form-control" required>
        </div>

        <!-- Wprowadzenie daty zakupu -->
        <div class="form-group">
            <label for="data_zakupu">Data zakupu:</label>
            <input type="date" name="data_zakupu" id="data_zakupu" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Zapisz Bilet</button>
    </form>
</div>
<script src="{{ asset('js/accessibility.js') }}"></script>
     <!-- Przycisk z opcjami dostępności -->
     <div class="accessibility-options">
    <button id="toggleZoomOnHover" class="btn btn-outline-dark">Powiększ po najechaniu</button>
    <button id="toggleReadAloud" class="btn btn-outline-dark">Czytaj na głos po najechaniu</button>
    <button id="toggleInvertColors" class="btn btn-outline-dark">Odwróć kolory</button>
</div>


    <style>
        .accessibility-bar {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            gap: 10px;
            flex-direction: column;
        }
    </style>

</body>
</html>
