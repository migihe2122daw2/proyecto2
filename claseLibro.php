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
            echo "Titol: " . $this->titol . "<br>";
            echo "Autor: " . $this->autor . "<br>";
            echo "ISBN: " . $this->ISBN . "<br>";
            echo "Prestec: " . $this->prestec . "<br>";
            echo "Inici prestec: " . $this->iniciprestec . "<br>";
            echo "Codi usuari: " . $this->codiusuari . "<br>";
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