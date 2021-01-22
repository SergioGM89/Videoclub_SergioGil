<?php
//Incluímos las librerías
include_once("lib/database.php");
include_once("classes/peliculas.php");

class peliculas_crud
{

    const TABLA = "peliculas";
    const PelAct = "peliculas_actores";
    const PelDir = "peliculas_directores";

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
        $titulo = $objeto->getTitulo();
        $anyo = $objeto->getAnyo();
        $duracion = $objeto->getDuracion();

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "UPDATE " . self::TABLA . " SET titulo = :titulo, anyo = :anyo, duracion = :duracion WHERE id = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR, 50);
        $query->bindParam(':anyo', $anyo, PDO::PARAM_STR, 4);
        $query->bindParam(':duracion', $duracion, PDO::PARAM_STR, 50);
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

        $pelicula = new pelicula($results['id'], $results['titulo'], $results['anyo'], $results['duracion']);

        return $pelicula;
    }

    /////////Devuelve desde la BD el objeto que corresponda a esa ID (de la tabla que corresponda)////////
    public static function obtenerActoresPelicula($id)
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM " . self::PelAct . " WHERE id_pelicula = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $pdo = Database::disconnect();

        return $results;
    }

    /////////Devuelve desde la BD el objeto que corresponda a esa ID (de la tabla que corresponda)////////
    public static function obtenerDirectoresPelicula($id)
    {

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM " . self::PelDir . " WHERE id_pelicula = :id";
        $query = $pdo->prepare($sql);

        //Enlazamos los parámetros
        $query->bindParam(':id', $id, PDO::PARAM_INT, 11);

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $pdo = Database::disconnect();

        return $results;
    }
}

?>