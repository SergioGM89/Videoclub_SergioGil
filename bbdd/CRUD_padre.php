<?php
class CRUD_padre{

    private abstract $tabla;
    

    //Inserta los datos a la BD del objeto pasado como argumento en la función
    public function insertar($objeto){
        
    }

    //Devuelve el listado de objetos de la BD (de la tabla que corresponda)
    public function mostrar(){

    }

    //Elimina de la BD el objeto que coincida con esa ID (de la tabla que corresponda)
    public function eliminar($id){

    }

    //Devuelve desde la BD el objeto que corresponda a esa ID (de la tabla que corresponda)
    public function obtener($id){

    }

    //Actualiza los datos a la BD del objeto pasado como argumento en la función
    public function actualizar($objeto){

    }

}


?>