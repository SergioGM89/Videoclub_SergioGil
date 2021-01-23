<?php
//Incluímos las librerías
include_once("lib/database.php");
include_once("classes/usuarios.php");

class usuarios_crud
{
    const TABLA = "usuarios";

    //////// Inserta un usuario nuevo con los datos pasados como argumento en la función ////////
    public static function insertar($objeto)
    {

        //Pasamos los datos del objeto a variables
        $email = $objeto->getNombre();
        $contrasenya = $objeto->getContrasenya();
        $credenciales = $objeto->getCredenciales();

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "INSERT INTO " . self::TABLA . " (email, password, guardaCredenciales) VALUES (:email, :contrasenya, :credenciales)";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $query->bindParam(':contrasenya', $contrasenya, PDO::PARAM_STR, 50);
        $query->bindParam(':credenciales', $credenciales, PDO::PARAM_BOOL);

        $query->execute();
        $filas_actualizadas = $query->rowCount();

        $pdo = Database::disconnect();

        return $filas_actualizadas;//Devolvemos el nº de filas afectadas
    }

    ///////// Devuelve desde la BD todos los usuario en un array ////////
    public static function mostrar()
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM ".self::TABLA."";
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    /////// Elimina de la BD el usuario que coincida con esa ID ////////
    public static function eliminar($id)
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "DELETE FROM " . self::TABLA . " where id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $filas_eliminadas = $query->rowCount();

        $pdo = Database::disconnect();

        return $filas_eliminadas;//Devolvemos el nº de filas afectadas
    }

    //////// Actualiza los datos a la BD del usuario pasado como argumento en la función ////////
    public static function actualizar($objeto)
    {

        //Pasamos los datos del objeto a variables
        $id = $objeto->getId();
        $email = $objeto->getNombre();
        $contrasenya = $objeto->getContrasenya();
        $credenciales = $objeto->getCredenciales();

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "UPDATE " . self::TABLA . " SET email = :email, password = :contrasenya, guardaCredenciales = :credenciales WHERE id = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $query->bindParam(':contrasenya', $contrasenya, PDO::PARAM_STR, 50);
        $query->bindParam(':credenciales', $credenciales, PDO::PARAM_BOOL);
        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $filas_actualizadas = $query->rowCount();

        $pdo = Database::disconnect();

        return $filas_actualizadas;//Devolvemos el nº de filas afectadas
    }

    ///////// Devuelve desde la BD el usuario que corresponda a esa ID ////////
    public static function obtener($id)
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM " . self::TABLA . " WHERE id = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        $pdo = Database::disconnect();

        $usuario = new usuario($results['id'], $results['email'], $results['password'], $results['guardaCredenciales']);

        return $usuario;
    }
}

?>