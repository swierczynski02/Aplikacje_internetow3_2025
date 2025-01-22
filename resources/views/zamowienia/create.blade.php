<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Zamówienie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">
    <h1>Dodaj Nowe Zamówienie</h1>
    <a href="{{ route('zamowienia.index') }}" class="btn btn-secondary mb-3">Powrót do zamówień</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('zamowienia.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="klient_id">Klient:</label>
            <select name="klient_id" id="klient_id" class="form-control" required>
                <option value="">Wybierz klienta</option>
                @foreach($uzytkownicy as $uzytkownik)
                    <option value="{{ $uzytkownik->id }}">{{ $uzytkownik->nazwa_uzytkownika }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="data_zamowienia">Data zamówienia:</label>
            <input type="date" name="data_zamowienia" id="data_zamowienia" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cena_calkowita">Całkowita cena:</label>
            <input type="number" step="0.01" name="cena_calkowita" id="cena_calkowita" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="oczekujące">Oczekujące</option>
                <option value="zrealizowane">Zrealizowane</option>
                <option value="anulowane">Anulowane</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status_platnosci">Status płatności:</label>
            <select name="status_platnosci" id="status_platnosci" class="form-control" required>
                <option value="oczekująca">Oczekująca</option>
                <option value="zapłacono">Zapłacono</option>
                <option value="odrzucona">Odrzucona</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Zapisz Zamówienie</button>
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
