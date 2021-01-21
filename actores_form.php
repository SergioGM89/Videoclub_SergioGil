<?php
//Incluímos las librerías
include("bbdd/actores_crud.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edición de actores</title>
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <h1>Edición de actores</h1>
		 <!-- INCLUIR CÓDIGO PHP -->
        <?php
        
        //Obtenemos los datos del actor
        $actor = actores_crud::obtener($_GET['id']);

        //Comprobamos si se le ha dado al botón GUARDAR
        if(isset($_POST['guardar'])){
            //Actualizamos el actor de la BD
            if(actores_crud::actualizar($actor) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "El actor ha sido actualizado correctamente.<br>";
                echo "<a href='peliculas.html'>Volver al incio</a>";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido actualizar el actor. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.html'>Volver al incio</a>";
                echo "</div>"; 
            }
        }
        
        ?>

        <form name="edicion" method="post" action=''.$_SERVER[PHP_SELF]>
            
            Nombre: <br><input type="text" name="nombre" placeholder="<?php echo "".$actor->getNombre(); ?>"><br>
            <br> 
            Año de Nacimiento: <br><input type="text" name="anyo" placeholder="<?php echo "".$actor->getAnyo(); ?>"><br>
            <br>
            País: <br><input type="text" name="pais" placeholder="<?php echo "".$actor->getPais(); ?> "><br>
            <br>
            <input class = "btn btn-primary" type="submit" name="guardar" value="Guardar">
        </form>
        

    </div>

</body>

</html>