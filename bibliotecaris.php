<?php

    include './loginBIBLIOTECARIS.php';

    session_start();

    if (isset($_POST['cerrar'])) {

        // Leer el archivo de bibliotecaris

        $fitxer_usuaris = "Bibliotecaris.txt";
        $fp = fopen($fitxer_usuaris, "r") or die("No s'ha pogut validar l'usuari");

        if ($fp) {
            $mida_fitxer = filesize($fitxer_usuaris);
            $usuaris = explode(PHP_EOL, fread($fp, $mida_fitxer));
        }

        // Buscar el usuario en el archivo

        foreach ($usuaris as $usuari) {
            $datos = explode(":", $usuari);

            if (($_SESSION['usuario'] == $datos[0]) && ($_SESSION['contrasena'] == $datos[1])) {
                session_start();

                session_unset();
                session_destroy();

                 // Comprobar si el usuario se ha eliminado

                if (isset($_SESSION['usuario'])) {
                    echo "<p>No s'ha pogut eliminar el bibliotecari</p>";
                } else {
                    echo "<p>S'ha eliminat el bibliotecari</p>";
                    header("Location: INDEX.html");
                }
                break;
            }
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
    <p>BIBLIOTECARI</p>
    <a href="catalegbiblio.php">Creació, visualització i eliminació llibres del catàleg</a>
    <a href="biblioUsuaris.php">Creació, visualització i eliminació d'usuaris</a>
    <a href="biblioPersonal.php">Visualització dades personals</a>
</body>
</html>