<?php
class actor
{

    private $id;
    private $nombre;
    private $anyo;
    private $pais;

    //Constructor
    function __construct($id, $nombre, $anyo, $pais){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->anyo = $anyo;
        $this->pais = $pais;
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getAnyo(){
        return $this->anyo;
    }
    
    public function getPais(){
        return $this->pais;
    }
}
