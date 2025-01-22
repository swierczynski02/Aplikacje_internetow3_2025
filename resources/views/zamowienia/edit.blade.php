<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Zamówienie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">
    <h1>Edytuj Zamówienie</h1>
    <a href="{{ route('zamowienia.index') }}" class="btn btn-secondary mb-3">Powrót do listy zamówień</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formularz edycji -->
    <form action="{{ route('zamowienia.update', $zamowienie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="klient_id" class="form-label">Klient</label>
            <select id="klient_id" name="klient_id" class="form-select" required>
                @foreach($uzytkownicy as $uzytkownik)
                    <option value="{{ $uzytkownik->id }}" {{ $uzytkownik->id == $zamowienie->klient_id ? 'selected' : '' }}>
                        {{ $uzytkownik->imie }} {{ $uzytkownik->nazwisko }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
        <input type="date" id="data_zamowienia" name="data_zamowienia" class="form-control" value="{{ \Carbon\Carbon::parse($zamowienie->data_zamowienia)->format('Y-m-d') }}" required>

        </div>

        <div class="mb-3">
            <label for="cena_calkowita" class="form-label">Całkowita cena</label>
            <input type="number" id="cena_calkowita" name="cena_calkowita" class="form-control" value="{{ $zamowienie->cena_calkowita }}" required>
        </div>

        <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-select" required>
        <option value="oczekujące" {{ $zamowienie->status == 'oczekujące' ? 'selected' : '' }}>Oczekujący</option>
        <option value="zrealizowane" {{ $zamowienie->status == 'zrealizowane' ? 'selected' : '' }}>Zrealizowany</option>
        <!-- Możesz dodać więcej opcji w zależności od dostępnych statusów -->
    </select>
</div>

<div class="mb-3">
    <label for="status_platnosci" class="form-label">Status płatności</label>
    <select id="status_platnosci" name="status_platnosci" class="form-select" required>
        <option value="oczekująca" {{ $zamowienie->status_platnosci == 'oczekująca' ? 'selected' : '' }}>Opłacono</option>
        <option value="zapłacona" {{ $zamowienie->status_platnosci == 'zapłacona' ? 'selected' : '' }}>Nieopłacono</option>
        <!-- Możesz dodać więcej opcji w zależności od dostępnych statusów płatności -->
    </select>
</div>


        <button type="submit" class="btn btn-primary">Zaktualizuj Zamówienie</button>
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
