<?php
class pelicula
{

    private $id;
    private $titulo;
    private $anyo;
    private $duracion;

    //Constructor
    function __construct($id, $titulo, $anyo, $duracion){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getAnyo(){
        return $this->anyo;
    }
    
    public function getDuracion(){
        return $this->duracion;
    }
}
