<?php

    // Iniciamos la sesión

    session_start();

    // Demannem l'usuari i la contrasenya

    $fitxer_usuaris = "usuaris.txt";
    $fp = fopen($fitxer_usuaris, "r") or die("No s'ha pogut obrir el fitxer");
    if($fp){
        $mida_fitxer = filesize($fitxer_usuaris);
        $usuaris = explode(PHP_EOL, fread($fp, $mida_fitxer));
    }
    foreach($usuaris as $usuari){
        $logpwd = explode(":", $usuari);
        if($_POST["usuari"] == $logpwd[0] && $_POST["password"] == $logpwd[1]){
            echo "Benvingut ".$_POST["usuari"]."<br>";
            echo "La teva contrasenya és ".$_POST["password"];
            fclose($fitxer);
            session_start();
        }else{
            echo "Usuari o contrasenya incorrectes";
            return;
        }
    }

?>