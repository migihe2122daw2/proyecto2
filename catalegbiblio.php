<?php
    include './loginCAPBIBLIO.php';
    include './loginBIBLIOTECARI.php';
    // Mostrar el id de sessió

    // Incluir la clase LLibres y demas
    
    include './claseCapBiblio.php';

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

                // Mostrar el formulario de creación de libros de forma bonita

                echo "<form action='catalegbiblio.php?mostrar=crear' method='post'>";
                echo "<table border=1>";
                echo "<tr><td>Título:</td><td><input type='text' name='titol'></td></tr>";
                echo "<tr><td>Autor:</td><td><input type='text' name='autor'></td></tr>";
                echo "<tr><td>ISBN:</td><td><input type='text' name='ISBN'></td></tr>";
                echo "<tr><td>Prestec:</td><td><input type='checkbox' name='prestec'></td></tr>";
                echo "<tr><td>Data inici prestec:</td><td><input type='date' name='inicprestec'></td></tr>";
                echo "<tr><td>Codi d'usuari:</td><td><input type='text' name='codiusuari'></td></tr>";
                echo "<td><input type='submit' name='crear' value='Crear' style='margin-left: 30; margin-right: 30;'></td>";
                echo "</table>";
                echo "</form>";

                $titolA = $_POST["titol"];
                $autorA = $_POST["autor"];
                $ISBNA = $_POST["ISBN"];
                $prestecA = $_POST["prestec"];
                $inicprestecA = $_POST["inicprestec"];
                $codiusuariA = $_POST["codiusuari"];

                // Ir a la clase Bibliotecaris o clase CapBiblio dependiendo de si es bibliotecari o CapBiblio al enviar el formulario


                // Comprobar que el libro no se envie vacío

                if ($ISBNA != "") {

                    if ($_SESSION["tipo"] == "biblio") {

                        // Crear un objeto de la clase Bibliotecari
    
                        $bibliotecari = new Bibliotecari();
    
                        // Crear el llibre
    
                        $bibliotecari->crearLlibre($titolA, $autorA, $ISBNA, $prestecA, $inicprestecA, $codiusuariA);
    
                    } else {
    
                        // Crear un objeto de la clase CapBiblio
    
                        $capBiblio = new CapBibliotecari();
    
                        // Crear el llibre
    
                        $capBiblio->crearLlibreC($titolA, $autorA, $ISBNA, $prestecA, $inicprestecA, $codiusuariA);
    
                    }

                }

            
                // Refrescar la página


                break;

            case "ELIMINAR":

                // Mostrar el formulario de eliminación de libros de forma bonita

                echo "<form action='catalegbiblio.php?mostrar=eliminar' method='post'>";
                echo "<table border=1>";
                echo "<tr><td>ISBN:</td><td><input type='text' name='ISBN'></td></tr>";
                echo "<td><input type='submit' name='eliminar' value='Eliminar' style='margin-left: 30; margin-right: 30;'></td>";
                echo "</table>";
                echo "</form>";

                $ISBNE = $_POST["ISBN"];

                // Ir a la clase Bibliotecaris o clase CapBiblio dependiendo de si es bibliotecari o CapBiblio al enviar el formulario

                if ($_SESSION["tipo"] == "biblio") {

                    // Crear un objeto de la clase Bibliotecari
    
                    $bibliotecari = new Bibliotecari();
    
                    // Eliminar el llibre
    
                    $bibliotecari->eliminarLlibre($ISBNE);
    
                } else {
    
                    // Crear un objeto de la clase CapBiblio
    
                    $capBiblio = new CapBibliotecari();
    
                    // Eliminar el llibre
    
                    $capBiblio->eliminarLlibreC($ISBNE);
    
                }

                // Refrescar la página

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
         /* Poner div session arriba a la derecha con un recuadro */

         #session {
            position: absolute;
            top: 10px;
            right: 0;
            width: 300px;
            height: 80px;
            background-color: #f1f1f1;
            border: 1px solid #d3d3d3;
            padding: 10px;
            font-size: 13px;
            text-align: center;
        }

        /* Posicionar el botón de cerrar sesión en el centro del recuadro */

        #Cerrar {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div id="session">
        <p name="idSessio">Id de sessio: <?php echo session_id() ?></p>
        <!-- Boton para cerrar sesion -->
        <form id="Cerrar" action="" method="post">
            <input style="font-size: 13px; " type="submit" name="cerrar" value="Cerrar sesión">
        </form>
    </div>
    <form action="catalegbiblio.php">
        <input type="text" name="mostrar">Tria l'opcio
        <input type="submit" value="Mostrar">
    </form>
</body>
</html>