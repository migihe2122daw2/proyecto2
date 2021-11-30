<?php

   // Iniciamos la sesion

    session_start();

    // Abrir archivo login.txt

    $archivo = fopen("Usuarios.txt", "r");

    // comprobamos que el usuario y la contraseña sean correctos

    if (isset($_POST["usuario"], $_POST["contrasena"])) {
        $usuario = $_POST["usuario"];

        $contrasena = $_POST["contrasena"];

        while (!feof($archivo)) {
            $linea = fgets($archivo);

            $datos = explode(":", $linea);

            if ($usuario == $datos[0] && $contrasena == $datos[1]) {
                $_SESSION["usuario"] = $usuario;

                $_SESSION["contrasena"] = $contrasena;

                $_SESSION["nombre"] = $datos[2];

                $_SESSION["apellidos"] = $datos[3];

                $_SESSION["edad"] = $datos[4];

                $_SESSION["email"] = $datos[5];

                $_SESSION["fecha"] = $datos[6];

                // Si el usuario y la contraseña son correctos, redirigimos a la pagina principal


                // comprobar si es usuario, bibliotecario o administrador

                

            }
            else {
                echo "Usuario o contraseña incorrectos";

                // Esperar 5 segundos y redirigir a la pagina de login

                header("Refresh: 5; url=index.html");
                break;

                // Si el usuario y la contraseña no son correctos, redirigimos a la pagina de login
            }
        }
    }
?>