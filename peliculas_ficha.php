<?php

//abrimos la sesión
session_start();
 
//Si la variable sesión está vacía nos redirecciona al index.html
if (!isset($_SESSION['usuario'])) 
{
   header("location:./index.php");
   exit();
}

//Incluímos las librerías
include_once("bbdd/peliculas_crud.php");
include_once("bbdd/directores_crud.php");
include_once("bbdd/actores_crud.php");
include_once("classes/directores.php");
include_once("classes/actores.php");
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Películas | Ficha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <!-- ESCRIBE AQUÍ TU CÓDIGO -->

        <?php

        //Array con las peliculas de la BD
        $array_peliculas = peliculas_crud::mostrar();
        //Arrays con los directores y actores de la película elegida
        $array_directores = peliculas_crud::obtenerDirectoresPelicula($_GET['id']);
        $array_actores = peliculas_crud::obtenerActoresPelicula($_GET['id']);

        //Recorremos el array de las peliculas de la BD y mostramos la elegida mediante GET
        foreach ($array_peliculas as $pelicula) {
            if ($pelicula->id == $_GET['id']) {
                echo "<b>Título: </b>".$pelicula->titulo."<br>";
                echo "<b>Año de estreno: </b>".$pelicula->anyo."<br>";
                echo "<b>Duración: </b>".$pelicula->duracion."<br>";
                continue;
            }
        }
        //Recorremos el array de directores de la peli elegida y los mostramos
        echo "<b>Director: </b><br>";
        foreach ($array_directores as $directores) {
            $director = directores_crud::obtener($directores->id_director);
            echo "<a href=directores_ficha.php?id=$directores->id_director>".$director->getNombre() ."</a><br>";
        }
        //Recorremos el array de actores de la peli elegida y los mostramos
        echo "<b>Actores: </b><br>";
        foreach ($array_actores as $actores) {
            $actor = actores_crud::obtener($actores->id_actor);
            echo "<a href=actores_ficha.php?id=$actores->id_actor>".$actor->getNombre()."</a><br>";
        }

        ?>
        
    </div>
</body>

</html>