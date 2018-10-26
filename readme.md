## Instalacja i konfiguracja
### 1. Pobieramy projekt poleceniem
```bash
git clone git@github.com:kfoszcz/simpleapp.git
```

### 2. Wchodzimy do katalogu projektu i pobieramy zależności composera
```bash
cd simpleapp
composer install
```

### 3. Tworzymy plik konfiguracyjny `.env` na podstawie pliku `.env.example`
```bash
cp .env.example .env
```

### 4. Generujemy klucz aplikacji
```bash
php artisan key:generate
```
Klucz zostanie ustawiony w pliku `.env` w polu `APP_KEY`.

### 5. Tworzymy pustą bazę danych MySQL

### 6. Ustawiamy dane dostępowe do bazy
W pliku konfiguracyjnym `.env` edytujemy pola:
- `DB_DATABASE` - nazwa bazy danych
- `DB_USERNAME` - użytkownik
- `DB_PASSWORD` - hasło

### 7. Tworzymy strukturę tabel w bazie danych
```bash
php artisan migrate
```

### 8. Uruchamiamy serwer
```bash
php artisan serve
```
Serwer deweloperski domyślnie nasłuchuje na porcie 8000.
