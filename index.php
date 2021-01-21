<?php

//Incluímos librerías
include("bbdd/usuarios_crud.php");

//Variable que muestra error de login
$error = false;

/* AÑADIR SESIÓN
if (login_OK($_POST['email'], $_POST['contrasenya'])) {
    //Creamos la sesión
    session_start();
    //Identificamos la sesión
    $_SESSION['nombre'] = $_POST['email'];
}
*/

//Comprobamos si ha enviado los datos para logearse
if(isset($_POST['email'], $_POST['contrasenya'])){
    //Comprobamos si está registrado ese usuario y contraseña en la BD  
    if(usuarios_crud::validarUsuario($_POST['email'], $_POST['contrasenya'])){
        //Instanciamos al usuario
        //$user = instanciaUsuario();
        //Creamos una sesión
        session_start();
        header('location:peliculas.php');//Redireccionamos a peliculas.php si el login es correcto    
    }else{
        $error = true;
    }
}


?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Gestión de películas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Listar películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <div style="display: inline-block;">
            <img src="./imgs/portada.png" class="mx-auto d-block" />
        </div>
        <div style="display: inline-block;">
            <form name="login" method="post" action="".$_SERVER[PHP_SELF]>

            <?php
                if($error){
                    echo "<p style='color:red';><b>Email o contraseña incorrectas</b></p>";
                }
            ?>
                <p>Correo electrónico</p>
                <input type="text" name="email"><br><br>
                <p>Contraseña</p>
                <input type="password" name="contrasenya"><br><br>
                <p><input type="checkbox" name="credencialesOK">
                    Guardar mis credenciales</p>
                <input class="btn btn-primary" type="submit" name="acceder" value="Acceder">
            </form>
        </div>
    </div>

</body>

</html>