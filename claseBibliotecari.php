<?php

    // Crear clase bibliotecari que herede de claseUsuario

    include_once "claseUsuario.php";
    include_once "claseLibro.php";
    
    class Bibliotecari extends Libro
    {

        // Atributos

        public $nombre;
        public $apellido1;
        public $apellido2;
        public $residencia;
        public $telefono;
        public $idBibliotecari;
        public $contrasena;
        public $numSS;
        public $primerDiaBibliotecari;
        public $salari;
        public $bibliotecariCap;

        // Constructor vacío

        public function __construct()
        {
            $this->nombre = "";
            $this->apellido1 = "";
            $this->apellido2 = "";
            $this->residencia = "";
            $this->telefono = "";
            $this->idBibliotecari = "";
            $this->contrasena = "";
            $this->numSS = "";
            $this->primerDiaBibliotecari = "";
            $this->salari = "";
            $this->bibliotecariCap = false;
        }

        // Getter y setters de los ultimos 3 atributos

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getApellido1()
        {
            return $this->apellido1;
        }

        public function setApellido1($apellido1)
        {
            $this->apellido1 = $apellido1;
        }

        public function getApellido2()
        {
            return $this->apellido2;
        }

        public function setApellido2($apellido2)
        {
            $this->apellido2 = $apellido2;
        }

        public function getResidencia()
        {
            return $this->residencia;
        }

        public function setResidencia($residencia)
        {
            $this->residencia = $residencia;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        public function getIdBibliotecari()
        {
            return $this->idBibliotecari;
        }

        public function setIdBibliotecari($idBibliotecari)
        {
            $this->idBibliotecari = $idBibliotecari;
        }

        public function getContrasena()
        {
            return $this->contrasena;
        }

        public function setContrasena($contrasena)
        {
            $this->contrasena = $contrasena;
        }

        public function getNumSS()
        {
            return $this->numSS;
        }

        public function setNumSS($numSS)
        {
            $this->numSS = $numSS;
        }

        public function getPrimerDiaBibliotecari()
        {
            return $this->primerDiaBibliotecari;
        }

        public function setPrimerDiaBibliotecari($primerDiaBibliotecari)
        {
            $this->primerDiaBibliotecari = $primerDiaBibliotecari;
        }

        public function getSalari()
        {
            return $this->salari;
        }

        public function setSalari($salari)
        {
            $this->salari = $salari;
        }

        public function getBibliotecariCap()
        {
            return $this->bibliotecariCap;
        }

        public function setBibliotecariCap($bibliotecariCap)
        {
            $this->bibliotecariCap = $bibliotecariCap;
        }

        // ToString

        public function __toString()
        {
            return "Nombre: " . $this->nombre . "<br>" .
                   "Apellido1: " . $this->apellido1 . "<br>" .
                   "Apellido2: " . $this->apellido2 . "<br>" .
                   "Residencia: " . $this->residencia . "<br>" .
                   "Telefono: " . $this->telefono . "<br>" .
                   "IdBibliotecari: " . $this->idBibliotecari . "<br>" .
                   "Contrasena: " . $this->contrasena . "<br>" .
                   "NumSS: " . $this->numSS . "<br>" .
                   "PrimerDiaBibliotecari: " . $this->primerDiaBibliotecari . "<br>" .
                   "Salari: " . $this->salari . "<br>" .
                   "BibliotecariCap: " . $this->bibliotecariCap . "<br>";
        }

    

        // Método para mostrar el bibliotecario con los datos de biblioPersonal.txt

        public function mostrarBibliotecario($usuario, $contrasena){

            // Abrir el fichero biblioPersonal.txt

            $fitxer_biblio="biblioPersonal.txt";
            $fp=fopen($fitxer_biblio,"r") or die ("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer=filesize($fitxer_biblio);
                $biblio = explode(PHP_EOL, fread($fp,$mida_fitxer));
            }

            foreach ($biblio as $bibliotecari) {
                $datos = explode(":", $bibliotecari);

                if($usuario == $datos[5] && $contrasena == $datos[6]){

                    $bibliotecari = new Bibliotecari();

                    // setters de los atributos

                    $bibliotecari->setNombre($datos[0]);
                    $bibliotecari->setApellido1($datos[1]);
                    $bibliotecari->setApellido2($datos[2]);
                    $bibliotecari->setResidencia($datos[3]);
                    $bibliotecari->setTelefono($datos[4]);
                    $bibliotecari->setIdBibliotecari($datos[5]);
                    $bibliotecari->setContrasena($datos[6]);
                    $bibliotecari->setNumSS($datos[7]);
                    $bibliotecari->setPrimerDiaBibliotecari($datos[8]);
                    $bibliotecari->setSalari($datos[9]);
                    $bibliotecari->setBibliotecariCap($datos[10]);

                    // Pasar a toString

                    $bibliotecari->__toString();

                    // Retornar el bibliotecario

                    return $bibliotecari;


                    
                }

                

            



                // set de los datos del bibliotecario

                

                // Comprobar si el usuario y la contraseña son correctos

            }

        


        }

        

        // Método para crear un llibre a partir de los datos que se pasan por parámetro desde catalogo.php
        
        public function crearLlibre($titolA, $autorA, $ISBNA, $prestecA, $inicprestecA, $codiusuariA){
            // utilizar objeto de la clase Bibiliotecari
            $bibliotecari = new Bibliotecari();
            // Utilizar setters de la clase Libro
            // Utilizar el métodos abstractos de la interficieLibro
            $bibliotecari->setTitol($titolA);
            $bibliotecari->setAutor($autorA);
            $bibliotecari->setISBN($ISBNA);
            $bibliotecari->setPrestec($prestecA);
            $bibliotecari->setIniciprestec($inicprestecA);
            $bibliotecari->setCodiusuari($codiusuariA);
            $bibliotecari->setIniciprestec($inicprestecA);
            $bibliotecari->setCodiUsuari($codiusuariA);
            echo "<br>";
            echo "El llibre " . $bibliotecari->getTitol() . " ha estat creat correctament.";


            // call funct to add txt

            $bibliotecari->crearLlibreBiblioteca();


        }
         




            
        }

?>