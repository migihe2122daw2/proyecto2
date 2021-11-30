<?php
	$fitxer_usuaris="~/Documents/M07/projecte/usuaris";
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);
		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['usuari'] == $logpwd[1])){
			fclose($fitxer);
			session_name($_POST["usuari"]);
			session_start();
			break;
		}
	}
?>
<html>
	<body>
		<b>TREBALLANT AMB SESSIONS I USUARIS</b><br>	
		<?php
			if (!isset($_SESSION["comptador"])) {
				 $_SESSION['comptador'] = 1;
				 
				 echo "S'ha visitat la web: " . $_SESSION["comptador"] . " vegada durant aquesta sessió.<br>";
				 echo "No hi ha data de l'anterior visita perquè és el primer accés.<br>";
				 echo "S'han creat i inicialitzat les variables de sessió perquè és el primer accés.<br>"; 
				 echo "Identificador de sessió: ".session_id()."<br>";
				 echo "Sessió de l'usuari:".session_name()."<br>"; 				 
			}	
			else{
				 $_SESSION["comptador"] += 1;
				 echo "S'ha visitat la web: " . $_SESSION["comptador"] . " vegades durant aquesta sessió.<br>";
				 echo "La darrera visita a la web va ser el: " . $_SESSION["data_darrer_acces"] . ".<br>";
				 echo "S'han actualitzat les variables de sessió perquè s'ha realitzat un nou accés.<br>";
				 echo "Identificador de sessió: ".session_id()."<br>";
				 echo "Sessió de l'usuari:".session_name()."<br>";
			}
			date_default_timezone_set('Europe/Andorra');
			$_SESSION['data_darrer_acces'] = date('d/m/Y h:i:s');
		?>
	</body>
</html>
