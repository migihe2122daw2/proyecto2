<?php

    class Libro{
        private $titol;
        private $autor;
        private $ISBN;
        private $prestec;
        private $iniciprestec;
        private $codiusuari;

        // Constructor

        public function __construct($titol, $autor, $ISBN, $prestec, $iniciprestec, $codiusuari){
            $this->titol = $titol;
            $this->autor = $autor;
            $this->ISBN = $ISBN;
            $this->prestec = $prestec;
            $this->iniciprestec = $iniciprestec;
            $this->codiusuari = $codiusuari;
        }

        // Getters

        public function getTitol(){
            return $this->titol;
        }

        public function getAutor(){
            return $this->autor;
        }

        public function getISBN(){
            return $this->ISBN;
        }

        public function getPrestec(){
            return $this->prestec;
        }

        public function getIniciprestec(){
            return $this->iniciprestec;
        }

        public function getCodiusuari(){
            return $this->codiusuari;
        }

        // Setters

        public function setTitol($titol){
            $this->titol = $titol;
        }

        public function setAutor($autor){
            $this->autor = $autor;
        }

        public function setISBN($ISBN){
            $this->ISBN = $ISBN;
        }

        public function setPrestec($prestec){
            $this->prestec = $prestec;
        }

        public function setIniciprestec($iniciprestec){
            $this->iniciprestec = $iniciprestec;
        }

        public function setCodiusuari($codiusuari){
            $this->codiusuari = $codiusuari;
        }

        // Mètodes

        public function mostrar(){

            // Mostrar els llibres de l'arxiu de text

            $arxiu = fopen("Llibres.txt", "r");

            while(!feof($arxiu)){
                $linea = fgets($arxiu);
            
                $llibre = explode(":", $linea);
                echo "<p>Titol: " . $llibre[0] . "</p>";
                echo "<p>Autor: " . $llibre[1] . "</p>";
                echo "<p>ISBN: " . $llibre[2] . "</p>";
                echo "<p>Prestec: " . $llibre[3] . "</p>";
                echo "<p>Inici prestec: " . $llibre[4] . "</p>";
                echo "<p>Codi usuari: " . $llibre[5] . "</p>";
            }

        }

        // Metode per crear un nou llibre al fitxer de text

        public function crearLlibre(){
            $fitxer = fopen("Llibres.txt", "a");
            fwrite($fitxer, $this->titol . "," . $this->autor . "," . $this->ISBN . "," . $this->prestec . "," . $this->iniciprestec . "," . $this->codiusuari . "\n");
            fclose($fitxer);
        }

        // Metode per modificar el llibre


        
    }
?>