<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edytuj Film</h1>

        <!-- Wyświetlanie komunikatu sukcesu -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Formularz edycji filmu -->
        <form action="{{ route('filmy.update', $film->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tytul" class="form-label">Tytuł</label>
                <input type="text" class="form-control" id="tytul" name="tytul" value="{{ old('tytul', $film->tytul) }}" required>
            </div>

            <div class="mb-3">
                <label for="gatunek" class="form-label">Gatunek</label>
                <select class="form-select" id="gatunek" name="gatunek" required>
                    <option value="komedia" {{ old('gatunek', $film->gatunek) == 'komedia' ? 'selected' : '' }}>Komedia</option>
                    <option value="dramat" {{ old('gatunek', $film->gatunek) == 'dramat' ? 'selected' : '' }}>Dramat</option>
                    <option value="horror" {{ old('gatunek', $film->gatunek) == 'horror' ? 'selected' : '' }}>Horror</option>
                    <option value="akcja" {{ old('gatunek', $film->gatunek) == 'akcja' ? 'selected' : '' }}>Akcja</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="rezyser" class="form-label">Reżyser</label>
                <input type="text" class="form-control" id="rezyser" name="rezyser" value="{{ old('rezyser', $film->rezyser) }}" required>
            </div>

            <div class="mb-3">
                <label for="rok_produkcji" class="form-label">Rok Produkcji</label>
                <input type="number" class="form-control" id="rok_produkcji" name="rok_produkcji" value="{{ old('rok_produkcji', $film->rok_produkcji) }}" required>
            </div>

            <div class="mb-3">
                <label for="czas_trwania" class="form-label">Czas Trwania (minuty)</label>
                <input type="number" class="form-control" id="czas_trwania" name="czas_trwania" value="{{ old('czas_trwania', $film->czas_trwania) }}" required>
            </div>

            <div class="mb-3">
                <label for="opis" class="form-label">Opis</label>
                <textarea class="form-control" id="opis" name="opis">{{ old('opis', $film->opis) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Zaktualizuj Film</button>
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
