<?php
//Incluímos las librerías
include("lib/database.php");
include("classes/actores.php");

class actores_crud
{

    const TABLA = "actores";

    public static function mostrar()
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM " . self::TABLA;
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $pdo = Database::disconnect();

        return $results;
    }

    ///////Elimina de la BD el objeto que coincida con esa ID (de la tabla que corresponda)////////
    public static function eliminar($id)
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "DELETE FROM " . self::TABLA . " where id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $filas_eliminadas = $query->rowCount();

        $pdo = Database::disconnect();

        return $filas_eliminadas;
    }

    ////////Actualiza los datos a la BD del objeto pasado como argumento en la función////////
    public static function actualizar($objeto)
    {

        //Pasamos los datos del objeto a variables
        $id = $objeto->getId();
        $nom = $objeto->getNombre();
        $anyo = $objeto->getAnyo();
        $pais = $objeto->getPais();

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "UPDATE ".self::TABLA." SET nombre = :nombre, anyoNacimiento = :anyoNacimiento, pais = :pais WHERE id = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':nombre', $nom, PDO::PARAM_STR, 50);
        $query->bindParam(':anyoNacimiento', $anyo, PDO::PARAM_STR, 4);
        $query->bindParam(':pais', $pais, PDO::PARAM_STR, 50);
        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $filas_actualizadas = $query->rowCount();

        $pdo = Database::disconnect();

        return $filas_actualizadas;
    }

    /////////Devuelve desde la BD el objeto que corresponda a esa ID (de la tabla que corresponda)////////
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

        $actor = new actor($results['id'], $results['nombre'], $results['anyoNacimiento'], $results['pais']);

        return $actor;
    }
}

?>