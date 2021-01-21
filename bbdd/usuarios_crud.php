<?php
class usuarios_crud
{

    //Valida si el usuario y contraseña existen en la BD. Si existe, devuelve el usuario instanciado.
    public static function validarUsuario($email, $password)
    {

        $lista_usuarios = self::mostrar();

        foreach ($lista_usuarios as $user) {
            if (($user['email'] == $email) && ($user['password'] == $password)) {
                $userInstanciado = new Usuario($user['id'], $user['email'], $user['password'], $user['guardaCredenciales']);
                echo "bien";
                return $userInstanciado;
            }
        }
        echo "mal";
        return "";
    }

    public static function mostrar()
    {

        //Incluímos las librerías
        include("lib/database.php");

        //Conectamos con la BD de viodeclub
        $pdo = Database::connect();

        $sql = "SELECT * FROM usuarios";
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}

?>