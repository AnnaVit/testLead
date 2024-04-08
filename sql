Существует одна единственная таблица данных вида: ID, AR, CR, IRR, EPC, EPL и т. д.
Дан некий ключ-идентификатор ID.
Используя один запрос в базу, необходимо получить последние 20 записей (ID, EPC, EPL)
у которых AR и CR равны аналогичным полям AR и CR ключа-идентификатора ID.

1. Скачала фаил с примером таблицы и создала таблицу в бд.
2. Перевела фаил в .csv и загрузила его в таблицу командой

LOAD DATA INFILE 'exampleSQL.csv'
    INTO TABLE leadTest
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

Можно выполнить запрос с подзапросом.
Но подзапросы выполняются последовательно,
что может привести к дополнительным операциям чтения и записи данных, что замедляет выполнение запроса.

SELECT ID, EPC, EPL, AR, CR
FROM leadTest
WHERE AR = (SELECT AR FROM leadTest WHERE ID = 29)
  AND CR = (SELECT CR FROM leadTest WHERE ID = 29)
ORDER BY ID DESC
LIMIT 20;

Потому лучше будет сделать это при помощи join

SELECT lt1.ID, lt1.EPC, lt1.EPL, lt1.AR, lt1.CR
FROM leadTest lt1
         JOIN leadTest lt2 ON lt1.AR = lt2.AR AND lt1.CR = lt2.CR
WHERE lt2.ID = 29
ORDER BY lt1.ID DESC
LIMIT 20;




