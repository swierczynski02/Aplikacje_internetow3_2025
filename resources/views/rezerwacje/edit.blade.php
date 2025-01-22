<!-- resources/views/rezerwacje/edit.blade.php -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Rezerwację</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container">
    <h1>Edytuj Rezerwację</h1>
    <a href="{{ route('rezerwacje.index') }}" class="btn btn-secondary mb-3">Powrót do listy rezerwacji</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formularz edycji rezerwacji -->
    <form action="{{ route('rezerwacje.update', $rezerwacja->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="klient_id" class="form-label">Klient</label>
            <select class="form-control" id="klient_id" name="klient_id">
                @foreach($uzytkownicy as $uzytkownik)
                    <option value="{{ $uzytkownik->id }}" {{ $uzytkownik->id == $rezerwacja->klient_id ? 'selected' : '' }}>
                        {{ $uzytkownik->imie }} {{ $uzytkownik->nazwisko }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="projekcja_id" class="form-label">Projekcja</label>
            <select class="form-control" id="projekcja_id" name="projekcja_id">
                @foreach($projekcje as $projekcja)
                    <option value="{{ $projekcja->id }}" {{ $projekcja->id == $rezerwacja->projekcja_id ? 'selected' : '' }}>
                        {{ $projekcja->film->tytul }} - {{ $projekcja->data }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numer_miejsca" class="form-label">Numer Miejsca</label>
            <input type="text" class="form-control" id="numer_miejsca" name="numer_miejsca" value="{{ $rezerwacja->numer_miejsca }}">
        </div>

        <div class="mb-3">
            <label for="data_rezerwacji" class="form-label">Data Rezerwacji</label>
            <input type="date" class="form-control" id="data_rezerwacji" name="data_rezerwacji" value="{{ \Carbon\Carbon::parse($rezerwacja->data_rezerwacji)->toDateString() }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="oczekująca" {{ $rezerwacja->status == 'oczekująca' ? 'selected' : '' }}>Oczekująca</option>
                <option value="potwierdzona" {{ $rezerwacja->status == 'potwierdzona' ? 'selected' : '' }}>Potwierdzona</option>
                <option value="odwołana" {{ $rezerwacja->status == 'odwołana' ? 'selected' : '' }}>Odwołana</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_waznosci" class="form-label">Data Ważności</label>
            <input type="date" class="form-control" id="data_waznosci" name="data_waznosci" value="{{ \Carbon\Carbon::parse($rezerwacja->data_waznosci)->toDateString() }}">
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Rezerwację</button>
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
