<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oceny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container">
    <h1>Oceny</h1>
    <a href="{{ route('main.index') }}" class="btn btn-secondary mb-3">Powrót do strony głównej</a>
    <a href="{{ route('oceny.create') }}" class="btn btn-primary mb-3">Dodaj nową ocenę</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabela z ocenami -->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Film</th>
            <th>Użytkownik</th>
            <th>Ocena</th>
            <th>Komentarz</th>
            <th>Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($oceny as $ocena)
            <tr>
                <td>{{ $ocena->film->tytul }}</td>
                <td>{{ $ocena->uzytkownik->nazwa_uzytkownika }}</td>
                <td>{{ $ocena->ocena }}</td>
                <td>{{ $ocena->komentarze }}</td>
                <td>
                <a href="{{ route('oceny.edit', $ocena->id) }}" class="btn btn-warning btn-sm">Edytuj</a>

                    <form action="{{ route('oceny.destroy', $ocena->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę ocenę?');" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/accessibility.js') }}"></script>

<!-- Opcje dostępności -->
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
