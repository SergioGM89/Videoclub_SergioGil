<?php
class director
{

    //Devolvemos un array con todos los directores
    public static function tabla_directores()
    {

        //Incluímos librerías
        //include("lib/utils.php");
        include("lib/database.php");
        include("classes/usuarios.php");

        //Conectamos con la BD videoclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM directores";
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }
}
