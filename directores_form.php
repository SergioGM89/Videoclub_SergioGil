<?php
//Incluímos las librerías
include("bbdd/directores_crud.php");
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
        <h1>Edición de directores</h1>
		 <!-- INCLUIR CÓDIGO PHP -->
        <?php
        
        //Obtenemos los datos del director
        $director = directores_crud::obtener($_GET['id']);

        //Comprobamos si se le ha dado al botón GUARDAR
        if(isset($_POST['guardar'])){
            //Actualizamos el director de la BD
            if(directores_crud::actualizar($director) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "El director ha sido actualizado correctamente.";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido actualizar el director. Inténtelo de nuevo más tarde.";
                echo "</div>"; 
            }
        }
        
        ?>

        <form name="edicion" method="post" action=''.$_SERVER[PHP_SELF]>
            
            Nombre: <br><input type="text" name="nombre" placeholder="<?php echo "".$director['nombre']; ?>"><br>
            <br> 
            Año de Nacimiento: <br><input type="text" name="anyo" placeholder="<?php echo "".$director['anyoNacimiento']; ?>"><br>
            <br>
            País: <br><input type="text" name="pais" placeholder="<?php echo "".$director['pais']; ?> "><br>
            <br>
            <input class = "btn btn-primary" type="submit" name="guardar" value="Guardar">
        </form>
        

    </div>


</body>

</html>