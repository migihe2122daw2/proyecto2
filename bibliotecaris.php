<?php

    // Importar classes

    require_once("claseLibro.php");

    if ($_GET["prueba"]) {

        // Convertir a mayúsculas

        $mostrar = strtoupper($_GET["prueba"]);
        

        // Switch para mostrar los libros

        switch ($mostrar) {

            case "MOSTRAR":

                // Crear un objeto de la clase LLibres

                $libros = new Libros();

                // Mostrar los libros

                $libros->mostrar();

                break;
            
            default:
                echo "No se ha seleccionado ningún libro";
                break;
    }
    }

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }
        p{
            font-weight: bold;
        }
        #cerrar{
            padding: 10vh;
            text-decoration: none;
            color: black;
        }
        #cerrar:hover{
            color:red;
        }
    </style>
</head>
<body>
    <p>BIBLIOTECARI</p>
    <a href="">Creació, visualització i eliminació llibres del catàleg</a>
    <a href="">Creació, visualització i eliminació d'usuaris</a>
    <a href="">Visualització dades personals</a>
    <a id="cerrar" href="">Cerrar sesión</a>

    <form action="bibliotecaris.php">
        <input type="text" name="prueba">
        <input type="submit" value="Crear llibre">
    </form>
    
</body>
</html>