<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Szczegół Zamówienia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Dodaj Szczegół Zamówienia</h1>
    <a href="{{ route('szczegolyZamowienia.index') }}" class="btn btn-secondary mb-3">Powrót</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('szczegolyZamowienia.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="zamowienie_id" class="form-label">Zamówienie</label>
        <select class="form-control" id="zamowienie_id" name="zamowienie_id" required>
            <option value="">Wybierz zamówienie</option>
            @foreach($zamowienies as $zamowienie)
                <option value="{{ $zamowienie->id }}">{{ $zamowienie->id }} - {{ $zamowienie->nazwa }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="bilet_id" class="form-label">Bilet</label>
        <select class="form-control" id="bilet_id" name="bilet_id" required>
            <option value="">Wybierz bilet</option>
            @foreach($bilets as $bilet)
                <option value="{{ $bilet->id }}">{{ $bilet->id }} - {{ $bilet->nazwa }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="ilosc" class="form-label">Ilość</label>
        <input type="number" class="form-control" id="ilosc" name="ilosc" value="{{ old('ilosc') }}" required>
    </div>

    <div class="mb-3">
        <label for="cena" class="form-label">Cena jednostkowa</label>
        <input type="text" class="form-control" id="cena" name="cena" value="{{ old('cena') }}" required>
    </div>

    <div class="mb-3">
        <label for="cena_calkowita" class="form-label">Całkowita cena</label>
        <input type="text" class="form-control" id="cena_calkowita" name="cena_calkowita" value="{{ old('cena_calkowita') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Dodaj</button>
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
