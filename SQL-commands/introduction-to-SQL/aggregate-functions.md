# Funciones Agregadoras

## Comands

Devolver una tabla con el recuento de de la cantidad de registros en la tabla reservaciones para cada fecha en orden descendente:

```shell
SELECT COUNT(id), fecha
FROM reservaciones
GROUP BY fecha
ORDER BY COUNT(id) DESC;
```

Crear tabla temporal con la suma del costo de todos los servicios:

```shell
SELECT SUM(precio) AS totalServicios FROM servicios;
```

Crear tabla temporal con el servicio con precio menor:

```shell
SELECT MIN(precio) AS precioMenor FROM servicios;
```

Crear tabla temporal con el servicio con precio mayor:

```shell
SELECT MAX(precio) AS precioMayor FROM servicios;
```
