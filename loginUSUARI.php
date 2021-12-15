<?php

   // Abrir archivo login.txt

   $fitxer_capbilbio="Usuarios.txt";
   $fp=fopen($fitxer_capbiblio,"r") or die ("No s'ha pogut validar l'usuari");

    if ($fp) {
        $mida_fitxer=filesize($fitxer_capbiblio);
        $capbiblio = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }

    session_start();

    // Asignar variables de sesión

    foreach ($capbiblio as $capbibliotecario) {
        $datos = explode(":", $capbibliotecario);

        if (($_POST['usuario'] == $datos[0]) && ($_POST['contrasena'] == $datos[1])) {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasena'] = $_POST['contrasena'];
            $_SESSION['tipo'] = "usuario";
            
            session_regenerate_id();

            // Redirigir a la página principal
            header("Location: capbibliotecarios.php");

            break;
        }
    }

?>