<?php

// Obtener la ruta actual de manera más confiable
$arrayRutas = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Array para almacenar todos los mensajes de error
$errores = [];

// Verificar si se ha enviado el formulario de inserción y se ha seleccionado un tipo
if (isset($_POST['insertar']) ) {

    if (isset($_POST['tipo'])){
        
   

    // Verificar que se hayan rellenado los datos comunes a todos los objetos
    if (
        isset($_POST['titulo']) && isset($_POST['anio']) && isset($_POST['publicacion']) &&
        isset($_POST['genero']) && isset($_POST['identificador']) &&
        !empty($_POST['titulo']) && !empty($_POST['anio']) && !empty($_POST['publicacion']) &&
        !empty($_POST['genero']) && !empty($_POST['identificador'])
    ) {
        // Verificar campos numéricos
        if (!is_numeric($_POST['anio'])) {
            array_push($errores, "El año debe ser un número.");    
        }
        // Dependiendo del tipo de objeto seleccionado, crear y persistir el objeto

        ///////////// tipo libro ///////////////////////
        if ($_POST['tipo'] == 'libro' && isset($_POST['autor']) && isset($_POST['extension']) &&
            !empty($_POST['autor']) && !empty($_POST['extension'])
        ) {
            // Verificar campos numéricos adicionales para libros
            if (!is_numeric($_POST['extension'])) {
                array_push($errores, "La extensión debe ser un número.");
            }else{
                  $libro = new Libro(null, $_POST['titulo'], $_POST['anio'], $_POST['publicacion'], $_POST['genero'], $_POST['identificador'], $_POST['autor'], $_POST['extension']);
                  $libro->persist($libro);
            }    
        }
        ///////////// end tipo libro ///////////////////////

        ///////////// tipo pelicula ///////////////////////
        if (isset($_POST['director']) && isset($_POST['duracion_minutos_pelicula']) && isset($_POST['actores']) &&
            !empty($_POST['director']) && !empty($_POST['duracion_minutos_pelicula']) && !empty($_POST['actores']) &&
            $_POST['tipo'] == 'pelicula'
        ) {
            // Verificar campos numéricos adicionales para películas
            if (!is_numeric($_POST['duracion_minutos_pelicula'])) {
                array_push($errores, "La duración de la película debe ser un número.");
            }else{
                  $pelicula = new Pelicula(null, $_POST['titulo'], $_POST['anio'], $_POST['publicacion'], $_POST['genero'], $_POST['identificador'], $_POST['director'], $_POST['duracion_minutos_pelicula'], $_POST['actores']);
            $pelicula->persist($pelicula);
            }    
        }
        ///////////// end tipo pelicula ///////////////////////

        ///////////// tipo disco ///////////////////////
        if ($_POST['tipo'] == 'disco' && isset($_POST['grupo_musico']) &&
            isset($_POST['duracion_minutos_disco']) && !empty($_POST['grupo_musico']) &&
            !empty($_POST['duracion_minutos_disco'])
        ) {
            // Verificar campos numéricos adicionales para discos
            if (!is_numeric($_POST['duracion_minutos_disco'])) {
                array_push($errores, "La duración del disco debe ser un número.");
            }else{
            $disco = new Disco(null, $_POST['titulo'], $_POST['anio'], $_POST['publicacion'], $_POST['genero'], $_POST['identificador'], $_POST['grupo_musico'], $_POST['duracion_minutos_disco']);
            $disco->persist($disco);
            }   
        }

        if (count($errores) > 0) {
            // Mostrar el formulario de inserción con los mensajes de error
            include_once(__DIR__ . '/../vistas/insertar.inc.php');
            exit(); 
        }else{
            // Redireccionar después de procesar el formulario
            $ruta = "/" . $arrayRutas[1] . "/" . $arrayRutas[2] . "/" . $arrayRutas[3] . "/" . $_POST["tipo"];
            header("Location:" . $ruta);
            exit();         
        }


    } else {
        // Agregar mensaje de error si faltan datos comunes
        array_push($errores, "Faltan datos comunes");
        include_once(__DIR__ . '/../vistas/insertar.inc.php');
    }

    }else{
        array_push($errores, "Selecciona un tipo de objeto y rellena los campos");
        include_once(__DIR__ . '/../vistas/insertar.inc.php');
    }

} else {
    // Mostrar el formulario de inserción por defecto
    
    include_once(__DIR__ . '/../vistas/insertar.inc.php');
}

?>
