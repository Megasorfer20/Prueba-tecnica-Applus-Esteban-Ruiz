# Ejercicio consultas SQL

## Consulta 1 - Libros Prestados:

Encuentra el título y el autor de los libros actualmente prestados, junto con el nombre del usuario que los tiene prestados. Incluye también la fecha de préstamo y la fecha de devolución.

```mysql
SELECT l.titulo AS titulo_libro, l.autor AS autor_libro, CONCAT(u.nombre," ",u.apellido) AS nombre_usuario, p.fecha_prestamo, p.fecha_devolucion
FROM `prestamo` AS `p`
INNER JOIN libro AS l ON p.libro_id = l.id
INNER JOIN usuario AS u ON p.usuario_id = u.id
WHERE p.fecha_devolucion > CURDATE() OR p.fecha_devolucion IS NULL;
```

**OUTPUT**

![image](https://github.com/Megasorfer20/Prueba-tecnica-Applus-Esteban-Ruiz/assets/123566003/d8893eb1-69c6-4bbc-a040-8cac1f609cca)


## Consulta 2 - Libros No Devueltos en 7 días:

Encuentra los títulos y autores de los libros que fueron prestados hace más de 7 días y aún no han sido devueltos. Incluye el nombre del usuario que los tiene prestados y la fecha de préstamo.

```mysql
SELECT l.titulo AS titulo_libro, l.autor AS autor_libro, CONCAT(u.nombre," ",u.apellido) AS nombre_usuario, p.fecha_prestamo
FROM `prestamo` AS `p`
INNER JOIN libro AS l ON p.libro_id = l.id
INNER JOIN usuario AS u ON p.usuario_id = u.id
WHERE DATE_ADD( p.fecha_prestamo, INTERVAL 7 DAY) <= CURDATE() AND p.fecha_devolucion IS NULL;
```

**OUTPUT**

![image](https://github.com/Megasorfer20/Prueba-tecnica-Applus-Esteban-Ruiz/assets/123566003/4b66f9cf-1670-4658-937a-c7fab117eb00)

