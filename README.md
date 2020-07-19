## Działanie systemu 
1. Przed uruchomieniem systemu należy wywołać 
    1. `Composer install` - komenda zainstaluje wszystkie laravelowe zależności
    2. `php artisan application:setUp` - komenda utworzy bazę danych jeśli takowa nie istnieje, wykona wszystkie
    potrzebne migracje oraz spopuluje bazę danych przykładowymi productami. 
2. Wejście na stronę główną projektu zwraca array z produktem spełniającym warunki. 

## Alternatywne rozwiązania
1. Baza danych 
    1. Kategorie duplikowane są dla każdego produktu, co może generować błędy w razie błędów w pisowni. 
    Alternatywnym rozwiązaniem byłoby stworzenie pełnej struktury many-to-many, czyli dodatkowej tabeli, która 
    trzymałaby nazwy kategorii, podczas gdy tabela `kategoria_produktu` zawierałaby jedynie `product_id` oraz `category_id`. 
    To pozwalałoby również na późniejszym etapie na pełniejsze wykorzystanie możliwości Eloquenta, lub jeśli wybór padłby 
    na inny framework czy czyste PHP łatwiejsze modelowanie danych.
2. Framework 
    1. Biorąc pod uwagę posiadane doświadczenie, do rozwiązania problemu wykorzystany został Laravel, jako że dostarcza 
    gotowe rozwiązania dla komunikacji z bazą danych. Jest to jednakowoż ciężki framework, dający szerokie możliwości
    nie wykorzystywane przy dla tak małej funkcjonalności. Alternatywnym rozwiązaniem byłaby implementacja rozwiązania 
    przy użyciu czystego PHP lub jednego z mikro frameworków.
    2. Przygotowane rozwiązanie nie wykorzystuje w pełni możliwości Eloquentowych modeli dla uproszczenia rozwiązania.  

