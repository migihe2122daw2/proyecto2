<?php
include './loginUSUARI.php';
    // Mostrar el id de sessió

    echo "Identificador de sessió: ".session_id()."<br>";

    // Incluir la clase LLibres

    require_once("claseLibro.php");

    // Leer los datos del formulario


    if ($_GET["mostrar"]) {

        // Convertir a mayúsculas

        $mostrar = strtoupper($_GET["mostrar"]);
        

        // Switch para mostrar los libros

        switch ($mostrar) {

            case "MOSTRAR":

                // Crear un objeto de la clase LLibres

                $libros = new Libro();

                // Mostrar los libros

                $libros->mostrar();

                break;
            case "CREAR":

                // Crear un objeto de la clase LLibres
    
                $libros = new Libro();
    
                // Mostrar los libros
    
                $libros->crearLlibre();
    
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
</head>
<body>
    <form action="catalegbiblio.php">
        <input type="text" name="mostrar">Tria l'opcio
        <input type="submit" value="Mostrar">
    </form>
    <a href="bibliotecaris.html">Torna</a>
</body>
</html>