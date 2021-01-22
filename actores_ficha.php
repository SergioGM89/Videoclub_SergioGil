<?php
//Incluímos las librerías
include_once("bbdd/actores_crud.php");
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>actores | Ficha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <!-- ESCRIBE AQUÍ TU CÓDIGO -->

        <?php

        $id = $_GET['id'];
        
        //Comprobamos si se le ha dado al botón BORRAR
        if (isset($_POST['borrar'])) {
            //Eliminamos el actor de la BD
            if (actores_crud::eliminar($id) == 1) {
                echo "<div class='alert alert-success' role='alert'>";
                echo "El actor ha sido borrado correctamente.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido eliminar el actor. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>";
            }
        }else{//Si no se le ha dado a BORRAR
            //Obtenemos el actor de la BD
            $actor = actores_crud::obtener($id);

            //Mostramos los datos del actor
            echo "<b>Nombre: </b>" . $actor->getNombre() . "<br>";
            echo "<b>Año de Nacimiento: </b>" . $actor->getAnyo() . "<br>";
            echo "<b>País: </b>" . $actor->getPais() . "<br>";
        
        ?>
        <!-- BOTONES EDITAR Y BORRAR -->
        
        <table style="width: 10%;">
            <td>
                <div>
                    <form class='boton_editar' method='get' action='actores_form.php'>
                        <input type='hidden' name='id' value='<?php echo "".$id; ?>'>
                        <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='editar'></div>
                    </form>
                </div>
            </td>

            <td>
                <div>
                    <form class='boton_borrar' method='post' action='' .$_SERVER[PHP_SELF]>
                        <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borrar'></div>
                    </form>
                </div>
            </td>
        </table>  
        <?php } //Cerramos el else ?>    
    </div>
</body>

</html>