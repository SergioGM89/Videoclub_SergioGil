<?php
//Incluímos las librerías
include_once("bbdd/directores_crud.php");
include_once("classes/directores.php");
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
        <h1>Edición de directores</h1><br>
		 <!-- INCLUIR CÓDIGO PHP -->
        <?php
        
        //Comprobamos si se le ha dado al botón GUARDAR
        if(isset($_POST['guardar'])){
            //Creamos el director con los datos guardados
            $director_actualizado = new director($_POST['id'], $_POST['nombre'], $_POST['anyo'], $_POST['pais']);
            //Actualizamos el director de la BD
            if(directores_crud::actualizar($director_actualizado) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "El director ha sido actualizado correctamente.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido actualizar el director. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }
        }

        //Obtenemos los datos del director
        $director = directores_crud::obtener($_GET['id']);
        
        ?>

        <form name="edicion" method="post" action=''.$_SERVER[PHP_SELF]>
            <input type='hidden' name='id' value='<?php echo "".$director->getId().""; ?>'>
            
            Nombre: <br><input type="text" name="nombre" value="<?php echo "".$director->getNombre(); ?>"><br>
            <br> 
            Año de Nacimiento: <br><input type="text" name="anyo" value="<?php echo "".$director->getAnyo(); ?>"><br>
            <br>
            País: <br><input type="text" name="pais" value="<?php echo "".$director->getPais(); ?> "><br>
            <br>
            <input class = "btn btn-primary" type="submit" name="guardar" value="Guardar">
        </form>
        

    </div>


</body>

</html>