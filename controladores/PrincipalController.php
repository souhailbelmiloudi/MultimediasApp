<?php

// Crear instancias de las clases Libro, Pelicula y Disco
$libros = new Libro();
$peliculas = new Pelicula();
$discos = new Disco();

// Obtener listas de todos los libros, películas y discos
$listaLibros = $libros->findAll(get_class($libros), Libro::class);
$listaPeliculas = $peliculas->findAll(get_class($peliculas), Pelicula::class);
$listaDiscos = $discos->findAll(get_class($discos), Disco::class);

// Incluir la vista principal para mostrar la información
include_once (__DIR__ . '/../vistas/principal.inc.php');

?>
