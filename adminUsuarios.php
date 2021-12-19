<?php

include './claseUsuario.php';
include './bibliotecaris.php';

// Forzar get



// Crear clase abstracta admin que herede de claseUsuario

    class Admin extends Usuario
    {

        // Clase sin atributos propios porque es abstracta

        // Metodo para visualizar datos de usuarios y eliminar usuarios

        // Metodo para mostrar todos los datos de todos los usuarios de usuariPersonal.txt

        public function visualizarUsuarios()
        {
            // Leer el archivo de usuarios

            $fitxer_usuaris = "usuariPersonal.txt";
            $fp = fopen($fitxer_usuaris, "r") or die("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer = filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp, $mida_fitxer));
            }

            // Utilizar la clase Usuario para mostrar los datos de cada usuario en una tabla

            foreach ($usuaris as $usuari) {
                $datos = explode(":", $usuari);

                $usuari = new Usuario();

                // setters de los atributos

                $usuari->setNombre($datos[0]);
                $usuari->setApellido1($datos[1]);
                $usuari->setApellido2($datos[2]);
                $usuari->setResidencia($datos[3]);
                $usuari->setEmail($datos[4]);
                $usuari->setTelefono($datos[5]);
                $usuari->setIdPersonal($datos[6]);
                $usuari->setContrasena($datos[7]);
                $usuari->setPrestado($datos[8]);
                $usuari->setFechaPrestamo($datos[9]);
                $usuari->setISBN($datos[10]);

                // Pasar a toString

                $usuari->toString();
                
                // Mostrar los usuarios en una tabla de tamaño fijo y espcio entre filas

                return $usuari;
            }



        }


    }



    




?>