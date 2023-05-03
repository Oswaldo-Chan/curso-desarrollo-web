# CRUD en Tablas

## Comandos

### INSERTAR

Insertar 1 registro en una tabla:

```shell
INSERT INTO nombre-tabla (nombre,precio) VALUES ("tinte de cabello",80);
```

Insertar 2 registros en una tabla:

```shell
INSERT INTO nombre-tabla (nombre,precio) VALUES 
("tinte de cabello",80),
("corte de cabello",150);
```

### SELECCIONAR

Seleccionar todos los elementos de una tabla:

```shell
SELECT * FROM nombre-tabla;
```

Seleccionar un campo de una tabla:

```shell
SELECT nombre-campo FROM nombre-tabla;
```

Seleccionar varios campos de una tabla:

```shell
SELECT id,nombre,precio FROM nombre-tabla;
```

Orden ascendente con respecto a una columna:

```shell
SELECT id,nombre,precio FROM nombre-tabla ODER BY precio ASC;
```

Orden ascendente con respecto a una columna:

```shell
SELECT id,nombre,precio FROM nombre-tabla ODER BY id DESC;
```

Seleccionar elementos con un limite:

```shell
SELECT id,nombre,precio FROM nombre-tabla LIMIT 2;
```

Seleccionar elemento con respecto a un id:

```shell
SELECT id,nombre,precio FROM nombre-tabla WHERE id = 5;
```

Seleccionar registros por columna numerica (en este caso precio) con respecto a una condicion:

```shell
SELECT * FROM servicios WHERE precio >= 80;
```

Seleccionar registros por columna numerica (en este caso precio) con respecto a una condicion BETWEEN:

```shell
SELECT * FROM servicios WHERE precio BETWEEN 100 and 200;
```

### ACTUALIZAR

Actualizar la columna de un registro:

```shell
UPDATE nombre-tabla SET precio = 20 WHERE id = 5;
```

Actualizar columnas de un registro:

```shell
UPDATE nombre-tabla SET nombre = "nombre actualizado", precio = 50 WHERE id = 10;
```

#### ELIMINAR

Eliminar un registro:

```shell
DELETE FROM servicios WHERE id = 1;
```

Eliminar todos los registros de la tabla (tener cuidado):

```shell
DELETE FROM servicios;
```
