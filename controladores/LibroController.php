<?php

// Crear una instancia de la clase Libro
$libros = new Libro();

// Verificar si se ha enviado el formulario de búsqueda (POST)
if (isset($_POST['buscar'])) {
    // Verificar si el campo 'id' está vacío
    if (empty($_POST['id'])) {
        // Mostrar un mensaje de error y cargar todos los libros
        $error = "El campo id está vacío";
        $listaLibros = $libros->findAll(get_class($libros), Libro::class);
        include_once (__DIR__ . '/../vistas/libros.inc.php');
    } elseif (is_numeric($_POST['id'])){
        // Obtener el id del formulario y buscar el libro correspondiente
        $id = $_POST['id'];
        $listaLibros = $libros->findconId(get_class($libros), $id, Libro::class);
        include_once (__DIR__ . '/../vistas/libros.inc.php');
    }else {
        // Mostrar un mensaje de error y cargar todos los libros
        $error = "El campo id debe ser numérico";
        $listaLibros = $libros->findAll(get_class($libros), Libro::class);
        include_once (__DIR__ . '/../vistas/libros.inc.php');
    }
} else {
    // Si no se ha enviado el formulario de búsqueda, cargar todos los libros
    $listaLibros = $libros->findAll(get_class($libros), Libro::class);
    include_once (__DIR__ . '/../vistas/libros.inc.php');
}

?>
