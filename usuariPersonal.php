<?php
    include("claseUsuario.php");
    include("loginUSUARI.php");

    include("claseCapBibliotecari.php");
    include("claseBibliotecari.php");


    session_start();

    // Mostrar todos los datos del usuario al carregar la página

    if (isset($_SESSION['usuario'])) {
        $usuarioS = $_SESSION['usuario'];
        $contrasena = $_SESSION['contrasena'];
        $usuario = new Usuario();

        $resultado = $usuario->mostrar($usuarioS, $contrasena);
        echo $resultado;
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

    
</body>
</html>