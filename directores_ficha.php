<?php
//Incluímos las librerías
include("bbdd/directores_crud.php");
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Directores | Ficha</title>
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

        //Comprobamos si se le ha dado al botón BORRAR
        if(isset($_POST['borrar'])){
            //Eliminamos el director de la BD
            if(directores_crud::eliminar($_GET['id']) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "El director ha sido borrado correctamente.<br>";
                echo "<a href='peliculas.html'>Volver al incio</a>";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido eliminar el director. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.html'>Volver al incio</a>";
                echo "</div>"; 
            }
        }
         
        //Array con los directores de la BD
        $array_directores = directores_crud::mostrar();

        foreach ($array_directores as $director) {
            //Mostramos los datos del director solicitado mediante GET
            if ($director->id == $_GET['id']) {
                echo "<b>Nombre: </b>".$director->nombre."<br>";
                echo "<b>Año de Nacimiento: </b>".$director->anyoNacimiento."<br>";
                echo "<b>País: </b>".$director->pais."<br>";
                continue;
            }
        }

        ?>
        <!-- BOTONES EDITAR Y BORRAR -->
        <table>
            <td>
                <div>
                    <form class='boton_editar' method='post' action='directores_form.php'>
                        <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='editar'></div>
                    </form>
                </div>
            </td>

            <td>
                <div>
                    <form class='boton_borrar' method='post' action=''.$_SERVER[PHP_SELF]>
                        <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borrar'></div>
                    </form>

                </div>
            </td>
        </table>
    </div>
</body>

</html>