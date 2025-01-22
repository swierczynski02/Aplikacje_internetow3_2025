<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Główna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
<script src="{{ asset('js/accessibility.js') }}"></script>
    <div class="container">
        <h1 class="mt-5">Witaj w systemie</h1>
        <p class="lead">Wybierz sekcję, którą chcesz wyświetlić:</p>

        <!-- Przycisk do strony Filmów -->
        <a href="{{ route('filmy.index') }}" class="btn btn-primary mb-3">Filmy</a>

        <!-- Przycisk do strony Pracowników -->
        <a href="{{ route('pracownicy.index') }}" class="btn btn-primary mb-3">Pracownicy</a>

        <!-- Przycisk do strony Biletów -->
        <a href="{{ route('bilety.index') }}" class="btn btn-primary mb-3">Bilety</a>

        <!-- Przycisk do strony Zamówień -->
        <a href="{{ route('zamowienia.index') }}" class="btn btn-primary mb-3">Zamówienia</a>

        <!-- Przycisk do strony Rezerwacji -->
        <a href="{{ route('rezerwacje.index') }}" class="btn btn-primary mb-3">Rezerwacje</a>

        <!-- Przycisk do strony Użytkowników -->
        <a href="{{ route('uzytkownicy.index') }}" class="btn btn-primary mb-3">Użytkownicy</a>

        <!-- Przycisk do strony Projekcji -->
        <a href="{{ route('projekcje.index') }}" class="btn btn-primary mb-3">Projekcje</a>

        <!-- Przycisk do strony Ocen -->
        <a href="{{ route('oceny.index') }}" class="btn btn-primary mb-3">Oceny</a>

        <!-- Przycisk do strony Szczegółów Zamówienia -->
        <a href="{{ route('szczegolyZamowienia.index') }}" class="btn btn-primary mb-3">Szczegóły Zamówienia</a>
    </div>
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
