# Buscar en SQL

Buscar registros los cuales tengan la palabra corte al principio en la columna nombre:

```shell
SELECT * FROM tabla WHERE nombre LIKE 'Corte%';
```

Buscar registros los cuales tengan la palabra corte al final en la columna nombre:

```shell
SELECT * FROM tabla WHERE nombre LIKE '%Corte';
```

Buscar registros los cuales tengan la palabra corte en la columna nombre:

```shell
SELECT * FROM tabla WHERE nombre LIKE '%Corte%';
```
