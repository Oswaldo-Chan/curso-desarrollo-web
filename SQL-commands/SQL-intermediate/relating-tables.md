# Relacionar Tablas

En este caso relacionaremos las siguientes tablas:

```Tabla de Clientes```

|Key|Atributos|
|---|---------|
|PK |ID       |
|   |Nombre   |
|   |Apellido |
|   |Teléfono |
|   |Email    |

```Tabla de Citas```

|Key|Atributos|
|---|---------|
|PK |ID       |
|   |Fecha    |
|   |Hora     |
|FK |ClienteID|

## Comandos

Hay que crear una tabla llamada ```citas``` siguiendo estos pasos:

crear una tabla nueva

```shell
CREATE TABLE citas (
```

agregarle las columnas correspondientes

```shell
id INT(11) NOT NULL AUTO_INCREMENT,
fecha DATE NOT NULL,
hora TIME NOT NULL,
```

agregar una columna la cual hará referencia al ID del cliente, tener en cuenta que deben ser del mismo tipo y misma extensión.

```shell
    -> clienteId INT(11) NOT NULL,
```

decir que el ID de la tabla ```citas``` será la Primary Key

```shell
    -> PRIMARY KEY (id),
```

Seleccionar ```clienteId``` para crear la relación

```shell
    -> KEY clienteId (clienteId),
```

Decir que la columna ```clienteId``` tendrá un limite y solamente aceptará ciertos valores, por lo tanto no se podrá ingresar un valor en clienteId que no exista en la tabla ```clientes```

```shell
    -> CONSTRAINT cliente_FK
```

convertir  ```clienteId``` en una Foreign Key

```shell
    -> FOREIGN KEY (clienteId)
```

Decirle a mysql en que tabla encontrará los valores de ```clienteId```

```shell
    -> REFERENCES clientes (id)
    -> );
```
