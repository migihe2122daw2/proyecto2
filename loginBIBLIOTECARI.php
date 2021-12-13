<?php

   // Abrir archivo login.txt
    $filename='Bibliotecaris.txt';
    $archivo = fopen($filename, "rb");
    

    // comprobamos que el usuario y la contraseña sean correctos

    if (isset($_POST["biblio"], $_POST["contrasena"])) {
        $usuario = $_POST["biblio"];

        $contrasena = $_POST["contrasena"];

        // leemos el archivo y lo guardamos en un array

        $lineas = explode("\n", fread($archivo, filesize("Bibliotecaris.txt"))); // leemos el archivo y lo guardamos en un array

        foreach ($lineas as $linea) {
            list($usuariotxt, $contrasenatxt) = explode(":", $linea); // separamos el usuario y la contraseña

            if ($usuariotxt == $usuario && $contrasenatxt == $contrasena) {
                session_start();
                $_SESSION["biblio"] = $usuario;
                $_SESSION["contrasena"] = $contrasena;
                echo "Bienvenido " . $usuario;
                header("Location: bibliotecaris.html");
            }
        
        }


        while (!feof($archivo)) {
            $linea = fgets($archivo);

            $datos = explode(":", $linea);

            echo $datos[$numLinea][0];
            echo $datos[$numLinea][1];
            echo "<br>";
            echo $usuario;
            echo $contrasena;
            echo "<br>";


            if ($datos[0] == $usuario && $datos[1] == $contrasena) {
                echo "Usuario y contraseña correctos";
                echo "<br>";
                echo "Bienvenido " . $usuario;

                $_SESSION["biblio"] = $usuario;
                $_SESSION["contrasena"] = $contrasena;

                header("refresh: 3; url=bibliotecaris.html");

                break;
            }else {

                echo "<script>alert('Usuario o contraseña incorrectos')</script>";
                //Rediriigimos a la pagina de login en 5 segundos

                header("refresh:2; url=index.html");
                break;
            }
        }
    }
    
    
?>