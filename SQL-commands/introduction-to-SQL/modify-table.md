# Modificar Una Tabla Existente

## Comandos

Agregar un campo extra:

```shell
ALTER TABLE nombre-tabla ADD descripcion VARCHAR(100) NOT NULL;
```

Modificar nombre y longitud del tipo de dato de una columna existente:

```shell
ALTER TABLE servicios CHANGE descripcion nuevonombre VARCHAR(50) NOT NULL;
```

Eliminar columna:

```shell
ALTER TABLE nombre-tabla DROP COLUMN descripcion;
```
