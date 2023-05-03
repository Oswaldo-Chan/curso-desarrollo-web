# Unir Tablas

Existen tres formas:

- ```INNER JOIN``` (enlace interno)
Combina los registros de dos tablas si hay valores coincidentes en un campo común
- ```LEFT JOIN``` (enlace externo)
 Combina todos los registros de la tabla A, incluso si no hay valores coincidentes para los registros en la tabla B
- ```RIGHT JOIN``` (enlace externo)
Combina todos los registros de la tabla B, incluso si no hay valores coincidentes para los registros de la tabla A

## Comandos

seleccionar una tabla (en este caso ```citas```) y luego aplicar el tipo de unión (en este caso ```Inner Join```) diciendo que la columna ```clienteId``` de la tabla A ```citas``` tendrá los valores de la columna ```id``` de la tabla B ````clientes```

```shell
SELECT * FROM citas
INNER JOIN clientes ON clientes.id = citas.clienteId;
```

Tanto INNER JOIN y LEFT JOIN devuelven todos los registros de la tabla A y luego devuelven todo lo que esté relacionado entre ambas tablas

RIGHT JOIN devolverá todos los registros de la tabla de B y en caso de que no hayan valores relacionados en la tabla A con respecto a la B devolverá NULL
