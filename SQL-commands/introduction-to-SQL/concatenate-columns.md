# Concatenar Columnas

## Comandos

Concatenar dos columnas:

```shell
SELECT CONCAT(nombre,' ',apellido) AS nombreCompleto FROM tabla;
```

Concatenar dos columnas con operador LIKE, este codigo devuelve un registro con respecto las columnas concatenadas:

```shell
SELECT * FROM tabla WHERE CONCAT(nombre,' ',apellido) LIKE '%ejemplo nombre%';
```

Codigo que devuelve un registro con la nueva columna concatenada con respecto al operador LIKE:

```shell
SELECT * FROM tabla WHERE CONCAT(nombre,' ',apellido) AS 'nombre completo' 
FROM reservaciones 
WHERE CONCAT(nombre,' ',apellido) 
LIKE '%ejemplo nombre%';
```
