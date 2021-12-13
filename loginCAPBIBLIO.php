<?php

   // Abrir archivo login.txt

   $fitxer_usuaris="Capbiblio.txt";
   $fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");

    if ($fp) {
        $mida_fitxer=filesize($fitxer_usuaris);
        $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }

    foreach ($usuaris as $usuari) {
        $datos = explode(":",$usuari);
        if (($_POST['capbiblio'] == $datos[0]) && ($_POST['contrasena'] == $datos[1])){
            session_name($_POST["capbiblio"]);
            session_start();


            // Guardar id de sesión en cookie

            setcookie("id_sesion", session_id(), time() + 3600);

            // Guardar id de sesion en una variable

            $id_sesion = session_id();

            // Redirigir a la página principal
            header("Location: capbiblio.php");

            break;
        }
    }
    
?>