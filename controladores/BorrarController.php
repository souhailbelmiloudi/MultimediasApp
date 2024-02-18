<?php

// Obtener la URL actual y dividirla en partes
$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

// Verificar si se ha especificado el tipo y la ID en la URL
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    // Crear una instancia del objeto según el tipo especificado
    $object = new $tipo();

    // Convertir el nombre del tipo a minúsculas para obtener el nombre de la tabla
    $tabla = strtolower($tipo);

    // Llamar al método delete del objeto para eliminar el registro
    $object->delete($tabla, $id);

    // Actualizar la URL y redireccionar a la página correspondiente
    $_GET['page'] = strtolower($tipo);
    $ruta = "/".$arrayRutas[1]."/".$arrayRutas[2]."/".$arrayRutas[3]."/".$_GET['page'];
    header("Location:".$ruta);
}

?>
