<?php

    // Crear clase bibliotecari que herede de claseUsuario

    include_once "claseUsuario.php";
    /*include_once "interficieLibro.php";*/

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
            $this->idBibliotecari = [8];
            $this->contrasena = "";
            $this->numSS = "";
            $this->primerDiaBibliotecari = "";
            $this->salari = "";
            $this->bibliotecariCap = false;
        }

        // Getter y setters de los ultimos 3 atributos

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

        // Método para crear un libro a partir de los datos de catalegbiblio.php

        /*public function crearLlibre($titolA, $autorA, $ISBNA, $prestecA, $inicprestecA, $codiusuariA){

            // utilizar objeto de la clase Bibiliotecari

            $bibliotecari = new Bibliotecari();

            // Utilizar el métodos abstractos de la interficieLibro

            $bibliotecari->setTitol($titolA);
            $bibliotecari->setAutor($autorA);
            $bibliotecari->setISBN($ISBNA);
            $bibliotecari->setPrestec($prestecA);
            $bibliotecari->setIniciprestec($inicprestecA);
            $bibliotecari->setCodiUsuari($codiusuariA);

            echo "<br>";
            echo "El llibre " . $bibliotecari->getTitol() . " ha estat creat correctament.";

            // Guardar el libro en el txt

            $fp = fopen("Llibres.txt", "a");
            fwrite($fp, $bibliotecari->getTitol() . ";" . $bibliotecari->getAutor() . ";" . $bibliotecari->getISBN() . ";" . $bibliotecari->getPrestec() . ";" . $bibliotecari->getIniciprestec() . ";" . $bibliotecari->getCodiUsuari() . "\n");
            
        }*/

    }

?>