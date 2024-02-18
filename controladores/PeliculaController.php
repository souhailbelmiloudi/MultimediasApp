<?php

// Crear una instancia de la clase Pelicula
$peliculas = new Pelicula();

// Verificar si se ha enviado el formulario de búsqueda (POST)
if (isset($_POST['buscar'])) {
    // Verificar si el campo 'id' está vacío
    if (empty($_POST['id'])) {
        // Mostrar un mensaje de error y cargar todas las películas
        $error = "El campo id está vacío";
        $listaPeliculas = $peliculas->findAll(get_class($peliculas), Pelicula::class);
        include_once (__DIR__ . '/../vistas/peliculas.inc.php');
    } elseif (is_numeric($_POST['id'])){
        // Obtener el id del formulario y buscar la película correspondiente
        $id = $_POST['id'];
        $listaPeliculas = $peliculas->findconId(get_class($peliculas), $id, Pelicula::class);
        include_once (__DIR__ . '/../vistas/peliculas.inc.php');
    }else {
        // Mostrar un mensaje de error y cargar todas las películas
        $error = "El campo id debe ser numérico";
        $listaPeliculas = $peliculas->findAll(get_class($peliculas), Pelicula::class);
        include_once (__DIR__ . '/../vistas/peliculas.inc.php');
    }
} else {
    // Si no se ha enviado el formulario de búsqueda, cargar todas las películas
    $listaPeliculas = $peliculas->findAll(get_class($peliculas), Pelicula::class);
    include_once (__DIR__ . '/../vistas/peliculas.inc.php');
}

?>
