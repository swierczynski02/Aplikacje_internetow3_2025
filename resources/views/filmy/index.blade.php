<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilety</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<script src="{{ asset('js/accessibility.js') }}"></script>
    <div class="container">
        <h1>Filmy</h1>
        <a href="{{ route('main.index') }}" class="btn btn-secondary mb-3">Powrót do strony głównej</a>

        <!-- Wyświetlanie komunikatu sukcesu -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('filmy.create') }}" class="btn btn-primary mb-3">Dodaj film</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Gatunek</th>
                    <th>Reżyser</th>
                    <th>Rok produkcji</th>
                    <th>Opis</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filmy as $film)
                    <tr>
                        <td>{{ $film->tytul }}</td>
                        <td>{{ $film->gatunek }}</td>
                        <td>{{ $film->rezyser }}</td>
                        <td>{{ $film->rok_produkcji }}</td>
                        <td>{{ $film->opis }}</td>
                        <td>
                            <!-- Link do edytowania filmu -->
                            <a href="{{ route('filmy.edit', $film->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            

                            <!-- Formularz do usuwania z potwierdzeniem -->
                            <form action="{{ route('filmy.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten bilet?');" style="display:inline-block;">
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

