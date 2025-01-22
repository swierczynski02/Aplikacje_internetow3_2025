# Aplikacje_internetowe_2025

1Tabela: Użytkownicy (uzytkownicy) id: Unikalny identyfikator użytkownika. nazwa_uzytkownika: Nazwa użytkownika. haslo: Hasło użytkownika (przechowywane w formie zaszyfrowanej). email: Adres e-mail użytkownika. rola: Rola użytkownika (administrator, klient, pracownik). data_utworzenia: Data utworzenia konta. data_aktualizacji: Data ostatniej modyfikacji konta.

2Tabela: Filmy (filmy) id: Unikalny identyfikator filmu. tytul: Tytuł filmu. gatunek: Gatunek filmu (np. komedia, dramat, horror). reżyser: Reżyser filmu. rok_produkcji: Rok produkcji. czas_trwania: Czas trwania filmu (w minutach). opis: Krótkie streszczenie fabuły. data_utworzenia: Data dodania filmu do systemu.

3Tabela: Projekcje (projekcje) id: Unikalny identyfikator projekcji. film_id: Klucz obcy do tabeli filmy, wskazujący projektowany film. data_czas: Data i godzina rozpoczęcia projekcji. sala: Sala kinowa, w której odbędzie się projekcja. dostępność_miejsc: Liczba dostępnych miejsc na projekcji. data_utworzenia: Data dodania projekcji.

4Tabela: Oceny (oceny) id: Unikalny identyfikator oceny. film_id: Klucz obcy do tabeli filmy, wskazujący oceniany film. uzytkownik_id: Klucz obcy do tabeli uzytkownicy, wskazujący użytkownika oceniającego film. ocena: Ocena filmu (np. w skali 1-10). komentarze: Uwagi użytkownika do filmu. data_oceny: Data oceny.

5Tabela: Bilety (bilety) id: Unikalny identyfikator biletu. klient_id: Klucz obcy do tabeli uzytkownicy, wskazujący klienta, który zakupił bilet. projekcja_id: Klucz obcy do tabeli projekcje, wskazujący projekcję filmu. rodzaj_biletu: Rodzaj biletu (np. "normalny", "ulgowy"). cena: Cena biletu. data_zakupu: Data zakupu biletu.

6Tabela: Zamówienia (zamowienia) id: Unikalny identyfikator zamówienia. klient_id: Klucz obcy do tabeli uzytkownicy, wskazujący klienta. data_zamowienia: Data złożenia zamówienia. cena_calkowita: Całkowita cena zamówienia. status: Status zamówienia (np. "oczekujące", "zrealizowane"). status_platnosci: Status płatności (np. "oczekująca", "zapłacona").

7Tabela: Szczegóły Zamówienia (szczegoly_zamowienia) id: Unikalny identyfikator szczegółu zamówienia. zamowienie_id: Klucz obcy do tabeli zamowienia. bilet_id: Klucz obcy do tabeli bilety. ilosc: Liczba zakupionych biletów. cena: Cena jednostkowa biletu. cena_calkowita: Całkowita cena za ten szczegół zamówienia.

8Tabela: Pracownicy (pracownicy) id: Unikalny identyfikator pracownika. uzytkownik_id: Klucz obcy do tabeli uzytkownicy, wskazujący pracownika. rola: Rola pracownika (np. "rejestracja", "obsługa klienta"). data_zatrudnienia: Data zatrudnienia pracownika.

9Tabela: Rezerwacje (rezerwacje) id: Unikalny identyfikator rezerwacji. klient_id: Klucz obcy do tabeli uzytkownicy, wskazujący klienta, który dokonał rezerwacji. projekcja_id: Klucz obcy do tabeli projekcje, wskazujący projekcję filmu, na którą dokonano rezerwacji. numer_miejsca: Numer miejsca, które zostało zarezerwowane (w sali kinowej). data_rezerwacji: Data i godzina dokonania rezerwacji. status: Status rezerwacji (np. "oczekująca", "potwierdzona", "odwołana"). data_waznosci: Data i godzina, do kiedy rezerwacja jest ważna (czyli do kiedy klient może opłacić rezerwację lub zrealizować ją). data_utworzenia: Data dodania rezerwacji do systemu.

Polecenia: php artisan db:seed php artisan migrate php artisan serve
