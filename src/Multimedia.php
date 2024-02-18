<?php
include_once (__DIR__ . '/../ORM/Funciones.php');

/**
 * class Multimedia es una clase abstracta que contiene los 
 * atributos y metodos que se comparten en las clases hijas
 * @method verificarIdentificador() metodo abstracto que se implementa en las clases hijas
 * trait Funciones2 es un trait que contiene los metodos ORM para insertar, eliminar y actualizar objetos en la base de datos
 */

abstract  class Multimedia 
{
    //atributos
    protected $id;
    protected $titulo;
    protected $anio;
    protected $publicacion;
    protected $genero;
    protected $identificador;
    //inclucion de trait
    use Funciones2; 



    //constructor
    public function __construct($id= "", $titulo = "", $anio = "", $publicacion = "", $genero = "", $dato = "" )
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->anio = $anio;
        $this->publicacion = $publicacion;
        $this->genero = $genero;
        $this->identificador = $this->verificarIdentificador($dato);
        
    }
    //-Fin constructor -//

    //getters y setters
     final public function getId() 
    {
        return $this->id;
    }
    final public function getTitulo() 
    {
        return $this->titulo;
    }

    final public function getAnio() 
    {
        return $this->anio;
    }

    final public function getPublicacion() 
    {
        return $this->publicacion;
    }

    final public function getGenero() 
    {
        return $this->genero;
    }

    final public function getIdentificador() 
    {
        return $this->identificador;
    }

    final public function setId($id) 
    {
        $this->id = $id;
    }

    final public function setTitulo($titulo) 
    {
        $this->titulo = $titulo;
    }

    final public function setAnio($anio) 
    {
        $this->anio = $anio;
    }

    final public function setPublicacion($publicacion) 
    {
        $this->publicacion = $publicacion;
    }

    final public function setGenero($genero) 
    {
        $this->genero = $genero;
    }

    final public function setIdentificador($identificador) 
    {
        $this->identificador = $identificador;
    }

    //- Fin getters y setters -//

    //metodo abstracto que se implementa en las clases hijas

    abstract public function verificarIdentificador($dato);


    //method toString
    public function __toString() 
    {
        return "Titulo: " . $this->titulo . "<br>" . "Año: " . $this->anio . "<br>" . "Publicacion: " . $this->publicacion . "<br>" . "Genero: " . $this->genero . "<br>";
    }

   
}

?>
