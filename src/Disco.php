<?php
// inclucion de clase padre 
include_once 'Multimedia.php';

/**
 * class Disco es una clase hija de la clase Multimedia
 */
class Disco extends Multimedia {
    //atributos
    private $grupo_musico;
    private $duracion_minutos;

    //constructor
    public function __construct($id= "", $titulo = "", $anio = "", $publicacion = "", $genero = "", $ISWC = "", $grupo_musico = "", $duracion_minutos = "") {
        parent::__construct($id= "", $titulo, $anio, $publicacion, $genero, $ISWC);
        $this->grupo_musico = $grupo_musico;
        $this->duracion_minutos = $duracion_minutos;
    }

    //getters y setters
    public function getGrupo_musico() {
        return $this->grupo_musico;
    }

    public function getDuracion_minutos() {
        return $this->duracion_minutos;
    }

    public function setGrupo_musico($grupo_musico) {
        $this->grupo_musico = $grupo_musico;
    }

    public function setDuracion_minutos($duracion_minutos) {
        $this->duracion_minutos = $duracion_minutos;
    }

    //metodos para elimitar guiones y espacios en blanco
    public function verificarIdentificador($ISWC) {
            // // Eliminar guiones y espacios
             $ISWC = str_replace(['-', ' '], '', $ISWC);
            return $ISWC;
    }
    //metodos toString
    public function __toString() {
        return parent::__toString() . "Autor: " . $this->getGrupo_musico() . "<br>" . "ISWC: " . parent::getIdentificador() . "<br>" . "Duracion: " . $this->getDuracion_minutos() . " Minutos <br>";
    }

}

?>