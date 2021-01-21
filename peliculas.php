<?php

//Cargamos las librerías
include("lib/database.php");
include("bbdd/peliculas_crud.php");
include("classes/peliculas.php");

//Conectamos con la BD de viodeclub
$pdo = Database::connect();

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
        <div class="row mx-auto">
            <!-- INCLUIR CÓDIGO PHP -->
            <?php
            

            $array_peliculas = mostrar();
            if ($array_peliculas != -1) {
                $num_pelis = count($array_peliculas);
                //Comprobamos que hayan pelis en la BBDD
                if ($num_pelis > 0) {
                    echo "<table>";
                    for ($i = 0; $i < $num_pelis; $i++) {
                        switch ($array_peliculas[$i]["id"]) {


                            case 1:
                                //EL PADRINO
                                echo "
                                        <td>
                                            <div class='card' style='margin-bottom:5px;'>
                                                <a class='custom-card' href='peliculas_ficha.php?id=1' title='" . $array_peliculas[$i]['titulo'] . "' alt='" . $array_peliculas[$i]['titulo'] . "'>
                                                    <img class='card-img-top' src='imgs/peliculas/1.jpg'>		

                                                    <div class='card-body'>
                                                        <h5 class='nombre' style='font-weight: bold;color: black' href='peliculas_ficha.php?id=1' title='" . $array_peliculas[$i]['titulo'] . "'>" . $array_peliculas[$i]['titulo'] . "</h5>
                                            
                                                        <table>
                                                            <td>
                                                                <div>
                                                                    <form class='boton_editar' method='post' action='peliculas_form.php'>
                                                                    <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='edita1'></div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                            
                                                            <td>
                                                                <div>
                                                                    <form class='boton_borrar' method='post' action='peliculas_borrado.php'>
                                                                    <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borra1'></div>
                                                                    </form>
                                            
                                                                </div>
                                                            </td>
                                                        </table>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    ";
                                break;
                            case 2:
                                //EL PADRINO 2
                                echo "
                                        <td>
                                            <div class='card' style='margin-bottom:5px;'>
                                                <a class='custom-card' href='peliculas_ficha.php?id=2' title='" . $array_peliculas[$i]['titulo'] . "' alt='" . $array_peliculas[$i]['titulo'] . "'>
                                                    <img class='card-img-top' src='imgs/peliculas/2.jpg'>		

                                                    <div class='card-body'>
                                                        <h5 class='nombre' style='font-weight: bold;color: black' href='peliculas_ficha.php?id=2' title='" . $array_peliculas[$i]['titulo'] . "'>" . $array_peliculas[$i]['titulo'] . "</h5>
                                            
                                                        <table>
                                                            <td>
                                                                <div>
                                                                    <form class='boton_editar' method='post' action='peliculas_form.php'>
                                                                    <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='edita2'></div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                            
                                                            <td>
                                                                <div>
                                                                    <form class='boton_borrar' method='post' action='peliculas_borrado.php'>
                                                                    <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borra2'></div>
                                                                    </form>
                                            
                                                                </div>
                                                            </td>
                                                        </table>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    ";
                                break;
                            case 3:
                                //SENDEROS DE GLORIA
                                echo "
                                        <td>
                                            <div class='card' style='margin-bottom:5px;'>
                                                <a class='custom-card' href='peliculas_ficha.php?id=3' title='" . $array_peliculas[$i]['titulo'] . "' alt='" . $array_peliculas[$i]['titulo'] . "'>
                                                    <img class='card-img-top' src='imgs/peliculas/3.jpg' >		

                                                    <div class='card-body'>
                                                        <h5 class='nombre' style='font-weight: bold;color: black' href='peliculas_ficha.php?id=3' title='" . $array_peliculas[$i]['titulo'] . "'>" . $array_peliculas[$i]['titulo'] . "</h5>
                                            
                                                        <table>
                                                            <td>
                                                                <div>
                                                                    <form class='boton_editar' method='post' action='peliculas_form.php'>
                                                                    <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='edita3'></div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                            
                                                            <td>
                                                                <div>
                                                                    <form class='boton_borrar' method='post' action='peliculas_borrado.php'>
                                                                    <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borra3'></div>
                                                                    </form>
                                            
                                                                </div>
                                                            </td>
                                                        </table>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    ";
                                break;
                            case 4:
                                //PRIMERA PLANA
                                echo "
                                        <td>
                                            <div class='card' style='margin-bottom:5px;'>
                                                <a class='custom-card' href='peliculas_ficha.php?id=4' title='" . $array_peliculas[$i]['titulo'] . "' alt='" . $array_peliculas[$i]['titulo'] . "'>
                                                    <img class='card-img-top' src='imgs/peliculas/4.jpg'>		

                                                    <div class='card-body'>
                                                        <h5 class='nombre' style='font-weight: bold;color: black' href='peliculas_ficha.php?id=4' title='" . $array_peliculas[$i]['titulo'] . "'>" . $array_peliculas[$i]['titulo'] . "</h5>
                                            
                                                        <table>
                                                            <td>
                                                                <div>
                                                                    <form class='boton_editar' method='post' action='peliculas_form.php'>
                                                                    <div class='editar'><input class='btn btn-primary' type='submit' value='Editar' name='edita4'></div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                            
                                                            <td>
                                                                <div>
                                                                    <form class='boton_borrar' method='post' action='peliculas_borrado.php'>
                                                                    <div class='borrar'><input class='btn btn-danger' type='submit' value='Borrar' name='borra4'></div>
                                                                    </form>
                                            
                                                                </div>
                                                            </td>
                                                        </table>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    ";
                                break;
                        }
                    }
                    echo "</table>";
                }
            } else {
                echo "No hay películas disponibles.";
            }
            ?>
        </div>
    </div>
</body>

</html>