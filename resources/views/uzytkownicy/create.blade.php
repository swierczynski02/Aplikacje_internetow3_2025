<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Użytkownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Dodaj Nowego Użytkownika</h1>
        <a href="{{ route('uzytkownicy.index') }}" class="btn btn-secondary mb-3">Powrót do listy użytkowników</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('uzytkownicy.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nazwa_uzytkownika" class="form-label">Nazwa użytkownika</label>
                <input type="text" class="form-control" id="nazwa_uzytkownika" name="nazwa_uzytkownika" value="{{ old('nazwa_uzytkownika') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="haslo" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="haslo" name="haslo" required>
            </div>

            <div class="mb-3">
                <label for="haslo_confirmation" class="form-label">Potwierdź Hasło</label>
                <input type="password" class="form-control" id="haslo_confirmation" name="haslo_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="rola" class="form-label">Rola</label>
                <select class="form-select" id="rola" name="rola" required>
                    <option value="administrator" {{ old('rola') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                    <option value="klient" {{ old('rola') == 'klient' ? 'selected' : '' }}>Klient</option>
                    <option value="pracownik" {{ old('rola') == 'pracownik' ? 'selected' : '' }}>Pracownik</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Użytkownika</button>
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
