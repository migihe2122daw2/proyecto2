<?php

// Crear clase libro con los siguientes atributos: titulo, autor, ISBN, prestec, iniciprestec, codiUsuari

    class Libro{
        
        public function getTitol();
        public function getAutor();
        public function getISBN();
        public function getPrestec();
        public function getIniciPrestec();
        public function getCodiUsuari();

        // Setters

        public function setTitol($titol);
        public function setAutor($autor);
        public function setISBN($ISBN);
        public function setPrestec($prestec);
        public function setIniciPrestec($inicprestec);
        public function setCodiUsuari($codiusuari);
        
    }
?>