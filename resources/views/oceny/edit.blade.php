<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj ocenę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container">
    <h1>Edytuj ocenę</h1>
    <a href="{{ route('oceny.index') }}" class="btn btn-secondary mb-3">Powrót do listy ocen</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formularz do edytowania oceny -->
    <form action="{{ route('oceny.update', $ocena->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select id="film_id" name="film_id" class="form-control">
                @foreach($filmy as $film)
                    <option value="{{ $film->id }}" {{ $film->id == $ocena->film_id ? 'selected' : '' }}>{{ $film->tytul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="uzytkownik_id" class="form-label">Użytkownik</label>
            <select id="uzytkownik_id" name="uzytkownik_id" class="form-control">
                @foreach($uzytkownicy as $uzytkownik)
                    <option value="{{ $uzytkownik->id }}" {{ $uzytkownik->id == $ocena->uzytkownik_id ? 'selected' : '' }}>{{ $uzytkownik->nazwa_uzytkownika }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ocena" class="form-label">Ocena (1-10)</label>
            <input type="number" id="ocena" name="ocena" class="form-control" value="{{ $ocena->ocena }}" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="komentarze" class="form-label">Komentarz</label>
            <textarea id="komentarze" name="komentarze" class="form-control" rows="4">{{ $ocena->komentarze }}</textarea>
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
