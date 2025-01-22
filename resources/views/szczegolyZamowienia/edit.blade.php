<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Szczegół Zamówienia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edytuj Szczegół Zamówienia</h1>
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

    <form action="{{ route('szczegolyZamowienia.update', $szczegol->id) }}" method="POST">
        @csrf
        @method('PUT')

        

        <div class="mb-3">
            <label for="ilosc" class="form-label">Ilość</label>
            <input type="number" class="form-control" id="ilosc" name="ilosc" value="{{ $szczegol->ilosc }}" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena jednostkowa</label>
            <input type="text" class="form-control" id="cena" name="cena" value="{{ $szczegol->cena }}" required>
        </div>

        <div class="mb-3">
            <label for="cena_calkowita" class="form-label">Całkowita cena</label>
            <input type="text" class="form-control" id="cena_calkowita" name="cena_calkowita" value="{{ $szczegol->cena_calkowita }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
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
