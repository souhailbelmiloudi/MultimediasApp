<?php

// Crear una instancia de la clase Disco
$discos = new Disco();

// Verificar si se ha enviado el formulario de búsqueda (POST)
if (isset($_POST['buscar'])) {

    // Verificar si el campo 'id' está vacío
    if (empty($_POST['id'])) {
        // Mostrar un mensaje de error y cargar todos los discos
        $error = "El campo id está vacío";
        $listaDiscos = $discos->findAll(get_class($discos), Disco::class);
        include_once (__DIR__ . '/../vistas/discos.inc.php');
    } elseif (is_numeric($_POST['id'])) {
        // Obtener el id del formulario y buscar el disco correspondiente
        $id = $_POST['id'];
        $listaDiscos = $discos->findconId(get_class($discos), $id, Disco::class);
        include_once (__DIR__ . '/../vistas/discos.inc.php');
    } else {
        // Mostrar un mensaje de error y cargar todos los discos
        $error = "El campo id debe ser numérico";
        $listaDiscos = $discos->findAll(get_class($discos), Disco::class);
        include_once (__DIR__ . '/../vistas/discos.inc.php');
    }
} else {
    // Si no se ha enviado el formulario de búsqueda, cargar todos los discos
    $listaDiscos = $discos->findAll(get_class($discos), Disco::class);
    include_once (__DIR__ . '/../vistas/discos.inc.php');
}

?>
