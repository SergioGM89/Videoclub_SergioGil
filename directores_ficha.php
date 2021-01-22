<?php
//Incluímos las librerías
include_once("bbdd/directores_crud.php");
include_once("classes/directores.php");
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

        $id = $_GET['id'];

        //Comprobamos si se le ha dado al botón BORRAR
        if(isset($_POST['borrar'])){
            //Eliminamos el director de la BD
            if(directores_crud::eliminar($id) == 1){
                echo "<div class='alert alert-success' role='alert'>";
                echo "El director ha sido borrado correctamente.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }else{
                echo "<div class='alert alert-success' role='alert'>";
                echo "ERROR! No se ha podido eliminar el director. Inténtelo de nuevo más tarde.<br>";
                echo "<a href='peliculas.php'>Volver al incio</a>";
                echo "</div>"; 
            }
        }else{//Si no se le ha dado a BORRAR
            //Obtenemos el director de la BD
            $director = directores_crud::obtener($id);

            //Mostramos los datos del director
            echo "<b>Nombre: </b>".$director->getNombre()."<br>";
            echo "<b>Año de Nacimiento: </b>".$director->getAnyo()."<br>";
            echo "<b>País: </b>".$director->getPais()."<br>";
        
        ?>
        <!-- BOTONES EDITAR Y BORRAR -->
        <table style="width: 10%;">
            <td>
                <div>
                    <form class='boton_editar' method='get' action='directores_form.php'>
                        <input type='hidden' name='id' value='<?php echo "".$id; ?>'>
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
        <?php } //Cerramos el else ?>  
    </div>
</body>

</html>