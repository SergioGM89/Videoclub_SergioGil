<?php

//Incluímos librerías
include_once("classes/usuarios.php");
include_once("bbdd/usuarios_crud.php");

//Variable que muestra error de login
$error = false;

///////////COOKIE DE CREDENCIALES GUARDADAS///////////
//Comprobamos si existe la Cookie de credenciales
$cookieExist = false;
if(isset($_COOKIE['credenciales'])){
    $cookieExist = true;
}

/////////// AÑADIR SESIÓN ///////////////
//Comprobamos si ha enviado los datos para logearse
if (isset($_POST['email'], $_POST['contrasenya'])) {
    //Guardamos las variables
    $usuario = $_POST["email"];
    $password = $_POST["contrasenya"];
    if(isset($_POST["credencialesOK"])){
    $credenciales = $_POST["credencialesOK"];
    }else{
        $credenciales = false;
    }

    //Comprobamos si está registrado ese usuario y contraseña en la BD
    $id = usuario::validarUsuario($usuario, $password);
    if ($id > 0) {

        //Actualizamos el usuario en la BD para introducir el valor 
        //de guardarCredenciales según el formulario
        $userBD = usuarios_crud::obtener($id);
        if(($userBD->getCredenciales()) != $credenciales){
            $userBD->setCredenciales($credenciales);
            usuarios_crud::actualizar($userBD);
        }

        if($userBD->getCredenciales()){
            setcookie("credenciales", $id, (time()+(60*60*24*365)));
        }else{
            setcookie("credenciales", "", (time()-(60*60*24*365)));
        }

        // Iniciamos sesión
        session_start();
        $_SESSION['usuario'] = "$usuario";

        //Redireccionamos a peliculas.php
        header("Location: peliculas.php");

        //terminamos la ejecución ya que si redireccionamos ya no nos interesa 
        //seguir ejecutando código de este archivo
        exit();
    } else {
        // Si el usuario no se encuentra en la BD 
        //imprime el siguiente mensaje 
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
            <form name="login" method="post" action="" .$_SERVER[PHP_SELF]>

                <?php
                if ($error) {
                    echo "<p style='color:red';><b>Email o contraseña incorrectas</b></p>";
                }

                if($cookieExist){
                    $usuario_cookie = usuarios_crud::obtener($_COOKIE["credenciales"]);
                    $mail = $usuario_cookie->getNombre();
                    $pass = $usuario_cookie->getContrasenya(); 
                }
                ?>
                <p>Correo electrónico</p>
                <input type="text" name="email" <?php if($cookieExist){ echo "value=$mail"; }?>><br><br>
                <p>Contraseña</p>
                <input type="password" name="contrasenya" <?php if($cookieExist){ echo "value=$pass"; }?>><br><br>
                <p><input type="checkbox" name="credencialesOK" value =true <?php if($cookieExist){ echo "checked"; }?>>
                    Guardar mis credenciales</p>
                <input class="btn btn-primary" type="submit" name="acceder" value="Acceder">
            </form>
        </div>
    </div>

</body>

</html>