# WdPAI2021

## Uruchomienie projektu
Aby uruchomić aplikacje należy użyć Dockera oraz polecenia docker-compose up, które wpisujemy w konsoli. Aplikacja uruchamia się na lokalnym serwerze http://localhost:8080.


## Technologie
*PHP
*HTML
*CSS
*Docker
*JavaScript
*PostgreSQL


## Opis projektu
MMEAL to aplikacja służąca do dodawania oraz wyszukiwania przepisów. Kulinarni odkrywcy mogą poszerzać swoje horyzonty oraz dzielić się swoimi najlepszymi przepisami z innymi. Dzięki ustaleniu ceny każdego składnika, każdy może wybrać recepturę na którą w danej chwili go stać :).

## Widoki 

### Widok logowania
-posiada on formularz z emailem i hasłem, jeśli użytkownik posiada już konto w aplikacji może w pełni korzystać z jej funkcjonalności. Na stronie widnieje także zaprojektowane przeze mnie logo oraz przycisk do otwarcia widoku z formularzem rejestracji.

### Widok rejestracji
-formularz z pierwszego widoku zostaje zmieniony na formularz rejestracji, który po wpisaniu wszystkich danych(poprawnie) dodaje nowego użytkownika i pozwala na zalogowanie się na stronie.

## Widoki podane ponizej posiadają pasek nawigacji
Zawiera on panel wyszukiwania oraz przyciski do przechodzenia między widokami, takie jak: profil użytkownika, znajomi oraz logo które po wciśnięciu kieruje na strone z przepisami

### Widok z przepisami
-w pasku głównym na górze ekranu widnieje tytuł strony oraz przycisk plusa pozwalający na przejście do strony z dodawaniem przepisu. Wyszukiwarka daje możliwość szybkiego znalezienia przepisu o danej nazwie bądź opisie.
-w panelu środkowym wyświetlane są wszystkie przepisy z informacjami o ocenie, poziomie trudności, czasie wykonania, cenie, autorze. Po kliknięciu w dany przepis aplikacja kieruje nas do strony wyświetlającej szczegóły przepisu.

### Widok dodawania przepisu
-widok jest formularzem w którym podajemy nazwę, opis, czas wykonania, ilość porcji oraz dodajemy zdjecie. Po wpisaniu wartości aplikacja kieruje na strone z dodawaniem składników do przepisu.

### Widok dodawania składników
-po wciśnięciu plusa znajdującego się obok tytułu zostaje dodany formularz w którym użytkownik wpisuje nazwę, wagę oraz cenę składnika.
-po wpisaniu składników i wykonaniu akcji na dużym przycisku znajdującym się pod formularzami składniki zostają dodane do przepisu i użytkownik zostaje przeniesieony na stronę z przepisem

### Widok szczegółów przepisu
-znajdziemy na nim informacje dotyczące konkretenego dania takie jak: zdjęcie, nazwę, czas przygotowania, składniki, ilość porcji oraz sposób przyrządzenia

### Widok profilu
-wyświetla informacje o profilu, a także pozwala użytkownikowi na wylogowanie się poprzez wciśnięcie ikony w prawym górnym rogu
