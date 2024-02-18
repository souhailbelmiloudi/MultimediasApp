
<?php
include_once 'Multimedia.php';

/**
 * class Pelicula es una clase hija de la clase Multimedia
 * 
 */
class Pelicula extends Multimedia {
    //atributos
    private $director;
    private $duracion_minutos;
    private $actores;

    //constructor
    public function __construct($id= "", $titulo="", $anio="", $publicacion="", $genero="", $isan="", $director="", $duracion_minutos="", $actores="") {
        parent::__construct($id= "", $titulo, $anio, $publicacion, $genero , $isan);
        $this->director = $director;
        $this->duracion_minutos = $duracion_minutos;
        $this->actores = $actores;
    }
    
    //getters y setters
    public function getDirector() {
        return $this->director;
    }

    public function getduracion_minutos() {
        return $this->duracion_minutos;
    }

    public function getActores() {
        return $this->actores;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function setDuracion_minutos($duracion_minutos) {
        $this->duracion_minutos = $duracion_minutos;
    }

    public function setActores($actores) {
        $this->actores = $actores;
    }

    //metodos para elimitar guiones y espacios en blanco
    public function verificarIdentificador($isan) {

         $isan = str_replace(['-', ' '], '', $isan);
   
        return $isan;  
        }


    //metodos toString
    public function __toString() {
        return parent::__toString()."Director: ".$this->director."<br>" ."ISAN: ".parent::getIdentificador()."<br>"."Duracion: ".$this->duracion_minutos." Minutos <br>"."Actores: ".$this->actores."<br>";
    }


}

?>