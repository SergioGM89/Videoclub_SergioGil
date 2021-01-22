<?php

//Cargamos las librerías
include_once("bbdd/peliculas_crud.php");


/*include("lib/utils.php");
include("lib/database.php");
$pdo = Database::connect();

if (login_OK($_POST['email'], $_POST['contrasenya'])) {
    //Creamos la sesión
    session_start();
    //Identificamos la sesión
    $_SESSION['nombre'] = $_POST['email'];
}*/
?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Películas</title>
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
    <?php

            //Comprobamos si se le ha dado al botón BORRAR
            if (isset($_GET['borrar'])) {
                //Eliminamos la pelicula de la BD
                if (peliculas_crud::eliminar($_GET['id']) == 1) {
                    echo "<div class='alert alert-success' role='alert'>";
                    echo "La pelicula ha sido borrado correctamente.<br>";
                    echo "</div>";
                } else {
                    echo "<div class='alert alert-success' role='alert'>";
                    echo "ERROR! No se ha podido eliminar la pelicula. Inténtelo de nuevo más tarde.<br>";
                    echo "</div>";
                }
            }
        echo "<div class='row mx-auto'>";
            //INCLUIR CÓDIGO PHP -->
            


            $array_peliculas = peliculas_crud::mostrar();
            //Comprobamos que hayan pelis en la BBDD
            $num_pelis = count($array_peliculas);
            if ($num_pelis > 0) {

                echo "<table>";
                for ($i = 0; $i < $num_pelis; $i++) {
            ?>

                    <td>
                        <div class='card' style='margin-bottom:5px;'>
                            <a class='custom-card' href='peliculas_ficha.php?id=<?php echo "" . $array_peliculas[$i]->id; ?>' title='<?php echo "" . $array_peliculas[$i]->titulo; ?>' alt='<?php echo "" . $array_peliculas[$i]->titulo; ?>'>
                                <img class='card-img-top' src='imgs/peliculas/<?php echo "" . $array_peliculas[$i]->id; ?>.jpg'>

                                <div class='card-body'>
                                    <h5 class='nombre' style='font-weight: bold;color: black' href='peliculas_ficha.php?id=<?php echo "" . $array_peliculas[$i]->id; ?>' title='<?php echo "" . $array_peliculas[$i]->titulo; ?>'><?php echo "" . $array_peliculas[$i]->titulo; ?></h5>


                                    <table>
                                        <td>
                                            <div>
                                                <form class='boton_editar' method='get' action='peliculas_form.php'>
                                                    <input type='hidden' name='id' value='<?php echo "" . $array_peliculas[$i]->id; ?>'>
                                                    <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='editar'></div>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <form class='boton_borrar' method='get' action='<?php echo "" . $_SERVER['PHP_SELF']; ?>'>
                                                    <input type='hidden' name='id' value='<?php echo "" . $array_peliculas[$i]->id; ?>'>
                                                    <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borrar'></div>
                                                </form>

                                            </div>
                                        </td>
                                    </table>
                                </div>
                            </a>
                        </div>
                    </td>

            <?php
                }
                echo "</table>";
            } else {
                echo "No hay películas disponibles.";
            }
            ?>
        </div>
    </div>
</body>

</html>