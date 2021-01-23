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
include_once("classes/peliculas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edición de películas</title>
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
    <h1>Edición de películas</h1><br>
        <!-- ESCRIBE AQUÍ TU CÓDIGO -->
        <?php
                
        //Comprobamos si se le ha dado al botón GUARDAR
        if(isset($_POST['guardar'])){
            //Creamos la pelicula con los datos guardados
            $pelicula_actualizada = new pelicula($_POST['id'], $_POST['titulo'], $_POST['anyo'], $_POST['duracion']);
            //Actualizamos la pelicula de la BD
            if(peliculas_crud::actualizar($pelicula_actualizada) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "La pelicula ha sido actualizado correctamente.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido actualizar la pelicula. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }
        }

        //Obtenemos los datos de la pelicula
        $pelicula = peliculas_crud::obtener($_GET['id']);
        
        ?>

        <form name="edicion" method="post" action=''.$_SERVER[PHP_SELF]>
            <input type='hidden' name='id' value='<?php echo "".$pelicula->getId().""; ?>'>

            Título: <br><input type="text" name="titulo" value="<?php echo "".$pelicula->getTitulo(); ?>"><br>
            <br> 
            Año de estreno: <br><input type="text" name="anyo" value="<?php echo "".$pelicula->getAnyo(); ?>"><br>
            <br>
            Duración: <br><input type="text" name="duracion" value="<?php echo "".$pelicula->getDuracion(); ?> "><br>
            <br>
            <input class = "btn btn-primary" type="submit" name="guardar" value="Guardar">
        </form>
    </div>

</body>

</html>