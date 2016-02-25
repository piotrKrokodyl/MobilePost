# MobilePost
Programowanie aplikacji internetowych - projekt

Fajne IDE to phpStorm i Visual Studio Code chodzą one na wszystkich 3 systemach operacyjnych.
Jeśli chodzi o git to całkiem nieźle chodzi Github for Windows.
W razie problemów wyślij wiadomość na priv na fcbk lub posta na grupie (wraz z oznaczeniem mnie).

Ściągnij GitHub for Windows, zainstaluj, zaloguj się. Jeśli repo MobilePost się automatycznie nie pojawi na lewym pasku, wejdź na gita na nasze repo zaznacz link do repo (nie z paska URL tylko z pola https obok download ZIP) następnie przeciągnij go do aplikacji github. Wybierz gdzie się ma zapisać lokalna wersja repozytorium. Na samej górze jest pole branch (domyślnie zaznaczony master) obok niego jest ikonka Create new branch, kliknij na nią. Wpisz swoje imię i nazwisko, w polu From branch wybierz dev, kliknij create… Nastepnie kliknij PPM na MobilePost: Open in Explorer
Miłego kodzenia :D
Gdy skończysz wprowadzać swoje zmiany stwórz nowy commit:
- otwórz GitHub for Windows
- wybierz MobilePost
- Changes (góra aplikacji)
- W summary wpisz co zrobiłeś np. add/fix/bug +opis twoich czynności w języku angielskim
- Enter/return/ create commit
- Ważne nigdy nie commituj nie przetestowanego/niedziałającego kodu chyba że jest on opisany jako bug 
  
Jeśli macie problem z Date.tamezone (pojawia się warning podczas instalacji):
php --ini
po wykonaniu tego polecenia zobaczysz gdzie jest  plik php.ini, otwórz go, ctrl+f: date i podmień linie: ;date.timezone =, na 
date.timezone = Europe/Warsaw
jeśli polecenie php --ini zwraca samo none wklej do C:\Windows plik php.ini z brach dokumentacja
(.user.ini jest do php na azure - nie tykać)
