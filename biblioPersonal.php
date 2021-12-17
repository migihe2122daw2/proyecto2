<?php
    include("loginBIBLIOTECARI.php");
    include("claseBibliotecari.php");

    // Limpiar buffer de los echo anteriores

    ob_end_clean();

    session_start();

    // Mostrar todos los datos del usuario al carregar la página

    if (isset($_SESSION['usuario'])) {
        $usuarioC = $_SESSION['usuario'];
        $contrasena = $_SESSION['contrasena'];
        $usuario = new Bibliotecari();

        $resultado = $usuario->mostrarBibliotecario($usuarioC, $contrasena);
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