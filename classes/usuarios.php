<?php
include("./bbdd/usuarios_crud.php");

class Usuario {

private $id;
private $nombre;
private $contrasenya;
private $credenciales;

public function __construct($id, $nom, $pass, $cred){
    $this->id = $id;
    $this->nombre = $nom;
    $this->contrasenya = $pass;
    $this->credenciales = $cred;

}

//GETTERS

public function getId(){
    return $this->id;
}

public function getNombre(){
    return $this->nombre;
}

public function getContrasenya(){
    return $this->contrasenya;
}

public function getCredenciales(){
    return $this->credenciales;
}

//SETTERS

public function setContrasenya($newContrasenya){
    $this->contrasenya = $newContrasenya;
}

public function setCredenciales($newCredenciales){
    $this->credenciales = $newCredenciales;
}


//Valida si el usuario está registrado devuelve el id y si no lo está devuelve 0
public static function validarUsuario($email, $password){
    
    //Llamamos a la función mostrar() de usuarios_crud.php
    $lista_usuarios = usuarios_crud::mostrar();

    foreach($lista_usuarios as $user){
        if((strtolower($user->email) == strtolower($email)) && ($user->password == $password)){
            return $user->id;
        }
    }
    return "0";

}

}
?>

