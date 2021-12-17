<?php

    // Crear clase bibliotecari que herede de claseUsuario

    include_once "claseUsuario.php";
    include_once "claseLibro.php";
    
    class Bibliotecari extends Usuario
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

        public function getnumSS(){
            return $this->numSS;
        }

        public function setnumSS(){
            return $this->numSS = $numSS;
        }

        public function getidBibliotecari(){
            return $this->idBibliotecari;
        }

        public function setidBibliotecari(){
            return $this->idBibliotecari = $idBibliotecari;
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

        public function toString(){
            return "Nombre: " . $this->nombre . "<br>" .
                    "Apellido1: " . $this->apellido1 . "<br>" .
                    "Apellido2: " . $this->apellido2 . "<br>" .
                    "Residencia: " . $this->residencia . "<br>" .
                    "Telefono: " . $this->telefono . "<br>" . 
                    "ID Bibliotecari: " . $this->idBibliotecari . "<br>" . 
                    "Contraseña: " . $this->contrasena . "<br>" . 
                    "Num Seguretat Social: " . $this->numSS . "<br>" . 
                    "Primer Dia Biblioteca: " . $this->getPrimerDiaBibliotecari . "<br>" . 
                    "Salari: " . $this->salari . "<br>" . 
                    "Cap bibliotecari: " . $this->getBibliotecariCap . "<br>";
        }

        // Método para mostrar el usuario segun su usuario y contrasena

        public static function mostrar($usuario, $contrasena){

            // Abrir el archivo en modo lectura

            $fitxer_usuaris="biblioPersonal.txt";
            $fp=fopen($fitxer_usuaris,"rb") or die ("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer=filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
            }
            
            foreach ($usuaris as $usuari) {
                $datos = explode(":", $usuari);

                if ($datos[5] == $usuario && $datos[6] == $contrasena) {
                    $usuari = new Bibliotecari();

                    // set de los datos del usuario

                    $usuari->setNombre($datos[0]);
                    $usuari->setApellido1($datos[1]);
                    $usuari->setApellido2($datos[2]);
                    $usuari->setResidencia($datos[3]);
                    $usuari->setTelefono($datos[4]);
                    $usuari->setidBibliotecari($datos[5]);
                    $usuari->setContrasena($datos[6]);
                    $usuari->setNumss($datos[7]);
                    $usuari->setPrimerDiaBibliotecari($datos[8]);
                    $usuari->setSalari($datos[9]);
                    $usuari->setBibliotecariCap($datos[10]);

                    // Pasar a string el usuario
                    $usuari = $usuari->toString();
                    // return 

                    return $usuari;
                }
            }
            fclose($fp);
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
            // Guardar el libro en el txt
            
        }

?>