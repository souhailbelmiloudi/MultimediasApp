<?php
// inclucion de clase padre
include_once 'Multimedia.php';

/**
 * class Libro es una clase hija de la clase Multimedia
 * 
 */
class Libro extends Multimedia {
    //atributos
    private $autor;
    private $extension;
    

    //constructor
    public function __construct($id= "", $titulo="", $anio="", $publicacion="", $genero="", $isbn="", $autor="", $extension="") {
        parent::__construct($id= "", $titulo, $anio, $publicacion, $genero, $isbn);
        $this->autor = $autor;
        $this->extension = $extension;
    }
    
    //getters y setters
    public function getAutor() {
        return $this->autor;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
    }

    //metodos para elimitar guiones y espacios en blanco
    public function verificarIdentificador($isbn) {
    $isbn = str_replace(['-', ' '], '', $isbn); 
    return $isbn;   
    }

    //metodos toString
    public function __toString() {
        return parent::__toString() . "Autor: " . $this->autor . "<br>". "ISBN: " . parent::getIdentificador() . "<br>" . "Extension: " . $this->extension . " Pagina <br>";
    }


}

?>