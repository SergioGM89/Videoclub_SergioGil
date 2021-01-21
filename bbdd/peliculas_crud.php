<?php



class peliculas_crud
{

    public function mostrar()
    {
        //Incluímos las librerías
        include("lib/database.php");

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM peliculas";
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $fichero = "bbdd/peliculas.csv";
        $array_pelis = -1;

        //Si existe el fichero lo abrimos para leerlo
        $manejador = fopen($fichero, "r");
        if ($manejador != FALSE) {
            $j = 0;
            while (($arrayFila = fgetcsv($manejador, 1000, ",")) != FALSE) {
                $array_pelis[$j]  = array("id" => $arrayFila[0], "titulo" => $arrayFila[1], "anyo" => $arrayFila[2], "duracion" => $arrayFila[3]);
                $j++;
            }
            fclose($manejador);
        }
        return $array_pelis;
    }
}
