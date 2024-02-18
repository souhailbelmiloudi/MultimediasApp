<?php


/**
 * trait Funciones2
 * trait permite definir métodos y propiedades en un bloque, para luego ser usados en una o más clases
 * 
 */
trait Funciones2 {

    //Atributos de conexión a base de datos
    private static $server = 'localhost';
    private static $db = 'mediacenter';
    private static $user = 'MediaCenter';
    private static $password = 'MediaCenter';

    /**
     * Funcion para realizar la conexión a la base de datos
     * @return [PDO] [objeto PDO con la conexión]
     * 
     */
    public function ConnectDB() :PDO {
        try {
          $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
        } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
        }
        return $connection;
      }
      /**
       * Funcion para realizar la desconexión a la base de datos
       * @param  [PDO] $connection [objeto PDO con la conexión]
       * 
       */
    public function disconnectDB( $connection) {
            $connection = null;
           
        }

    /**
     * funcion para recuperar todos los registros de una tabla
     * @param  [string] $table [nombre de la tabla]
     * @param  [string] $classname [nombre de la clase]
     * @return [array de objetos] 
     * 
     */ 
     public function findAll(string $table, string $classname) : array {
    $connection = self::ConnectDB();
    $listaObjetos = [];
    try {   
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $connection->prepare("SELECT * FROM $table");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $obj = new $classname(); // Crear una instancia de la clase dinámicamente
            $reflectionClass = new ReflectionClass($classname); // Usar Reflexión para obtener los métodos y propiedades de la clase

            foreach ($row as $key => $value) {
                // Verificar si la propiedad existe en la clase y setear su valor si es así
                if ($reflectionClass->hasProperty($key)) {
                    $setter = 'set' . ucfirst($key); // Construir el nombre del método setter
                    // Verificar si el método setter existe en la clase
                    if ($reflectionClass->hasMethod($setter)) {
                        $obj->$setter($value); // Llamar al método setter para asignar el valor
                    }
                }
            }
            $listaObjetos[] = $obj;
        }
        return $listaObjetos;

    } catch (PDOException $e) {
        $connection->rollback();
        throw new Exception("Error al recuperar objetos: " . $e->getMessage());
    } finally {
        self::disconnectDB($connection);
    }
}

    /**
     * funcion para recuperar un registro de una tabla
     * @param  [string] $table [nombre de la tabla]
     * @param  [int] $id    [id del registro]
     * @param  [string] $classname [nombre de la clase]
     * @return [array de objetos]
     */

    public function findConId(string $table, int $id,$classname) : array {
        $connection = self::connectDB();
        $listaObjetos = [];
        try {
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $connection->prepare("SELECT * FROM $table WHERE id = ?");
        
            $query->bindParam(1, $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result != null){
                 $obj = new $classname(); // Crear una instancia de la clase dinámicamente
            $reflectionClass = new ReflectionClass($classname); // Reflexión para obtener los métodos y propiedades de la clase

            foreach ($result as $key => $value) {
                // Verificar si la propiedad existe en la clase y setear su valor si es así
                if ($reflectionClass->hasProperty($key)) {
                    $setter = 'set' . ucfirst($key); // Construir el nombre del método setter
                    // Verificar si el método setter existe en la clase
                    if ($reflectionClass->hasMethod($setter)) {
                        $obj->$setter($value); // Llamar al método setter para asignar el valor
                    }
                }

            }
             $listaObjetos[] = $obj;
            return $listaObjetos;

            }else{
                return [];
            }
                
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
             self::disconnectDB($connection);
        }
    }

    /**
     * funcion para borrar un registro de una tabla
     * @param  [string] $object [objeto a insertar]
     * 
     * 
     */ 
     
    public function persist($object) {
    $connection = self::connectDB();
 
       try {
        $connection->beginTransaction();

        $className = get_class($object);
        switch ($className) {
            case 'Disco':
                $query = $connection->prepare("INSERT INTO $className (titulo, grupo_musico, anio, publicacion, duracion_minutos, identificador, genero) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $titulo = $object->getTitulo();
                $grupo_musico = $object->getGrupo_musico();
                $anio = $object->getAnio();
                $publicacion = $object->getPublicacion();
                $Duracion_minutos = $object->getDuracion_minutos();
                $iswc = $object->getIdentificador();
                $genero = $object->getGenero();

                $query->bindParam(1, $titulo);
                $query->bindParam(2, $grupo_musico);
                $query->bindParam(3, $anio);
                $query->bindParam(4, $publicacion);
                $query->bindParam(5, $Duracion_minutos);
                $query->bindParam(6, $iswc);
                $query->bindParam(7, $genero);
                break;
            case 'Libro':
                $query = $connection->prepare("INSERT INTO $className (titulo, autor, anio, publicacion, extension, identificador, genero) VALUES (?, ?, ?, ?, ?, ?, ?)");

                 $titulo = $object->getTitulo();
                 $autor = $object->getAutor();
                $anio = $object->getAnio();
                $publicacion = $object->getPublicacion();
                $extension = $object->getExtension();
                $isbn = $object->getIdentificador();
                $genero = $object->getGenero();

                $query->bindParam(1, $titulo);
                $query->bindParam(2, $autor);
                $query->bindParam(3, $anio);
                $query->bindParam(4, $publicacion);
                $query->bindParam(5, $extension);
                $query->bindParam(6, $isbn);
                $query->bindParam(7, $genero);

                break;
            case 'Pelicula':
                $query = $connection->prepare("INSERT INTO $className (titulo, director, actores, anio, publicacion, duracion_minutos, identificador, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $titulo = $object->getTitulo();
                $director = $object->getDirector();
                $actores = $object->getActores();
                $anio = $object->getAnio();
                $publicacion = $object->getPublicacion();
                $duracion_minutos = $object->getDuracion_minutos();
                $isan = $object->getIdentificador();
                $genero = $object->getGenero();

                $query->bindParam(1, $titulo);
                $query->bindParam(2, $director);
                $query->bindParam(3, $actores);
                $query->bindParam(4, $anio);
                $query->bindParam(5, $publicacion);
                $query->bindParam(6, $duracion_minutos);
                $query->bindParam(7, $isan);
                $query->bindParam(8, $genero);
                break;
                
        }

        if (isset($query)) {
            if ($query->execute()) {
                $connection->commit();
            } else {
                $connection->rollBack();
                echo "Error al ejecutar la consulta.";
            }
        }
    } catch (Exception $e) {
       $connection->rollBack();
       echo "Fallo: " . $e->getMessage();
    } finally {
        self::disconnectDB($connection);
    }
}

/**
 * funcion para actualizar un registro de una tabla
 * @param  [string] $object [objeto a actualizar]
 
 */
 public function flush($object)
{
    $dbConn = self::connectDB();
    try {  
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbConn->beginTransaction();
        //obtener el nombre de la tabla
        $tableName = get_class($object);
        //obtener las propiedades de la clase en un array de objetos
        $reflectionClass = new ReflectionClass($tableName);
        $columns = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
        
        //construir la consulta de actualización
        $updateQuery = "UPDATE $tableName SET ";
        $updateColumns = [];

        // Construir la consulta de actualización con los atributos del objeto
        // este foreach recorre las propiedades de la clase y las añade a la consulta de actualización 
        foreach ($columns as $value) {
            if ($value->getName() !== 'id') { // excluir la actualización del ID
                $updateColumns[] = $value->getName() . " = :{$value->getName()}";
            }
        }
        //añade a la consulta de actualización el id del objeto
        $updateQuery .= implode(", ", $updateColumns);
        $updateQuery .= " WHERE id = :id";
        
        
        $stmt = $dbConn->prepare($updateQuery);
        // Vincular parámetros
        foreach ($columns as $column) {
            if ($column->getName() !== 'id') { // excluir la actualización del ID
                $prop = $reflectionClass->getProperty($column->getName()); // Obtener la propiedad de la clase
                $prop->setAccessible(true); // Hacer accesible la propiedad
                $stmt->bindValue(":{$column->getName()}", $prop->getValue($object)); // Vincular el valor de la propiedad
            }
        }
        // Vincular el ID
        $idProp = $reflectionClass->getProperty('id');
        $idProp->setAccessible(true);
        $stmt->bindValue(":id", $idProp->getValue($object));
        
        // Execute the query
        $stmt->execute();
        
        $dbConn->commit();
    } catch (Exception $e) {
        $dbConn->rollBack();
        echo "Error: " . $e->getMessage();
    } finally {
        self::disconnectDB($dbConn);
    }
}


 /**
  * funcion para borrar un registro de una tabla
    * @param  [string] $table [nombre de la tabla]
    * @param  [int] $id    [id del registro]
  */

public function delete(string $table, int $id) {
    $connection = self::connectDB();
    try {
        $connection->beginTransaction();
        $query = $connection->prepare("DELETE FROM $table WHERE id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        $connection->commit();
        
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "Error: " . $e->getMessage();
    } finally {
        self::disconnectDB($connection);

    }


}

}
?>