# Crear Tabla y Tipos de Datos

## Tipo de datos

### Numeros y Enteros

| TIPO | RANGO | UNSIGNED |
|------|-------|----------|
|INT|-2100 millones a 2100 millones|0 a 400+ millones|
|TINYINT|-128 a 127|0 a 255|
|SMALLINT|-32,768 a 32,767|0 a 65,535|
|MEDIUMINT|-8.3 millones a 8.3 millones|0 a 16.7 millones|
|BIGINT|-2^63 a (2^63)-1|0 a (2^64)-1|

### Numeros con Decimales

| TIPO | USOS |
|------|-------|
|FLOAT|valores decimales|
|DOUBLE|valores decimales muy grandes|
|DECIMAL|valores donde no se acepta redondo (dinero)|

### Texto y Datos Binarios

| TIPO | USOS |
|------|-------|
|VARCHAR|texto corto, o texto que varia en su extension (hasta 255 caracteres)|
|CHAR|corto, extension fija, (como un password encriptado)|
|TEXT|texto largo (como una entrada de blog)|
|ENUM|un valor de una lista enumerada|
|BLOB|imagenes, sonidos y archivos comprimidos|

### Fecha y Hora

| TIPO | USOS |
|------|-------|
|DATE|AAAA-MM-DD|
|TIME|hh:mm:ss|
|DATETIME|AAAA-MM-DD hh:mm:ss|
|TIMESTAMP|AAAA-MM-DD hh:mm:ss|
|YEAR|AAAA|

### Mas Comunes

| TIPO | USOS |
|------|-------|
|INT|numeros enteros|
|TINYINT|numeros pequeños como edades|
|DECIMAL|dinero y medidas|
|VARCHAR|textos cortos|
|TEXT|textos largos|
|DATETIME|fechas|

## Comandos

Crear tabla:

```shell
CREATE TABLE servicios (
```

Añadir columna del tipo entero con longitud 11 autoincrementable con la restriccion de que siempre debe tener un valor:

```shell
id INT(11) NOT NULL AUTO_INCREMENT,
```

Añadir columna del tipo varchar con longitud 60 con la restriccion de que siempre debe tener un valor:

```shell
nombre VARCHAR(60) NOT NULL,
```

Añadir columna del tipo decimal con 3 numeros entero y 2 decimales con la restriccion de que siempre debe tener un valor:

```shell
precio DECIMAL(5,2) NOT NULL,
```

Añadir columna del tipo TIME el cual si no tiene un dato tendra un valor DEFAUL el cual tomará la hora en que se creó el registro:

```shell
hora TIME DEFAULT NULL,
```

seleccionar id como identificador:

```shell
PRIMARY KEY (id)
```

finalizar query:

```shell
);
```

mostrar tablas:

```shell
SHOW TABLES;
```

mostrar contenido de una tabla:

```shell
DESCRIBE nombre-tabla;
```
