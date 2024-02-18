<?php
// Inclusión de clases
include_once '../src/Libro.php';
include_once '../src/Pelicula.php';
include_once '../src/Disco.php';
include_once '../src/Multimedia.php';

// Dividir la URL actual en partes
$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

// Inclusión de la barra de navegación
include_once '../vistas/nav.inc.php';

// Mapeo de páginas a controladores
$pagesToControllers = [
    'principal' => 'PrincipalController.php',
    'libro' => 'LibroController.php',
    'pelicula' => 'PeliculaController.php',
    'disco' => 'DiscoController.php',
    'insertar' => 'InsertarController.php',
    'editar' => 'EditarController.php',
    'borrar' => 'BorrarController.php'
];

// Obtener la página solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'principal';

// Verificar si la página está en el mapeo de páginas
if (array_key_exists($page, $pagesToControllers)) {
    $controllerFile = __DIR__ . '/' . $pagesToControllers[$page];
    if (file_exists($controllerFile)) {
        include_once $controllerFile;
    } else {
        // Controlador no encontrado
        include_once '../vistas/Error.inc.php';
    }
} else {
    // Página no encontrada
    include_once '../vistas/Error.inc.php';
}
?>
<script src="js/index.js"></script>
