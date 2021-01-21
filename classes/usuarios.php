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



public static function validarUsuario($email, $password){
    
    //Llamamos a la función mostrar() de usuarios_crud.php
    $lista_usuarios = mostrar();

    foreach($lista_usuarios as $user){
        if(($user['email'] == $email) && ($user['password'] == $password)){
            return true;
        }
    }
    return false;

}

}
?>

