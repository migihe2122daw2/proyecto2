<?php
    include './loginUSUARI.php';

    // Generar un nuevo id de sesión

    session_id();

    // mostrar datos del usuario

    echo "<p>Nom: " . $_SESSION['usuario'] . "</p>";
    echo "<p>Cognoms: " . $_SESSION['contrasena'] . "</p>";
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
    <p name="idSessio">Id de sessio: <?php echo session_id() ?></p>
    <p>USUARI</p>
    <a href="catalegbiblio.php">Visualització llista de llibres disponibles</a>
    <a href="usuariPersonal.php">Visualització dades personal</a>
    <a id="cerrar" href="">Cerrar sesión</a>
</body>
</html>