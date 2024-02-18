<?php

// Dividir la URL actual en partes
$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

// Verificar si se ha enviado el formulario de modificación (POST)
if (isset($_POST['modificar'])) {
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];
    $object = new $tipo();

    // Iterar sobre los datos del formulario y asignarlos al objeto
    foreach ($_POST as $key => $value) {
        if ($key != 'modificar') {
            $miset = "set" . $key;
            $object->$miset($value);
        }
    }

    // Guardar los cambios en la base de datos
    $object->flush($object);

    // Redirigir a la página de origen
    $_GET['page'] = strtolower($tipo);
    $ruta = "/".$arrayRutas[1]."/".$arrayRutas[2]."/".$arrayRutas[3]."/".$_GET['page'];
    header("Location:".$ruta);
    exit();
} elseif (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];

    // Validar que el tipo de objeto sea permitido
    $clasesPermitidas = ['Libro', 'Disco', 'Pelicula'];

    if (in_array($tipo, $clasesPermitidas)) {
        $object = new $tipo(); // Crear una instancia del tipo de objeto dinámicamente

        // Lógica para cargar los datos del objeto según el ID proporcionado
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Milibro = $object->findConId(get_class($object), $id, $tipo);

            // Recorrer el array de objetos para extraer las propiedades
            foreach ($Milibro as $objeto) {
                // Obtener las propiedades del objeto
                $reflectionClass = new ReflectionClass(get_class($objeto));
                $props = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
            }

            // Incluir la vista para editar el objeto
            include_once (__DIR__ . '/../vistas/Editar.inc.php');
        } else {
            // Manejar el caso en el que no se proporciona un ID 
            echo "Falta el ID";
        }
    } else {
        // Manejar el caso en el que no se proporciona un tipo de objeto
        echo "Falta el tipo de objeto";
    }
}

?>
