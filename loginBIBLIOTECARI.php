<?php

   // Abrir archivo login.txt

   $fitxer_biblio="Bibliotecaris.txt";
   $fp=fopen($fitxer_biblio,"r") or die ("No s'ha pogut validar l'usuari");

    if ($fp) {
        $mida_fitxer=filesize($fitxer_biblio);
        $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }

    session_start();

    // Asignar variables de sesión

    foreach ($usuaris as $usuari) {
        $datos = explode(":",$usuari);


        if (($_POST['usuario'] == $datos[0]) && ($_POST['contrasena'] == $datos[1])){
            
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasena'] = $_POST['contrasena'];
            //datos[2] tolowercase
            $_SESSION['tipo'] = strtolower($datos[2]);
            session_regenerate_id();

            // Redirigir a la página principal
            header("Location: capbiblio.php");

            break;
        }
    }
    
?>