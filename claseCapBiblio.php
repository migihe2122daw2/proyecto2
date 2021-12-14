<?php

    // Crear clase CapBibliotecari que herede de claseBibliotecari

    class CapBibliotecari extends Bibliotecari implements claseLibro
    {

        // Atributos

        public $bibliotecariCap;

        // Constructor vacío

        public function __construct()
        {
            $this->bibliotecariCap = false;
        }

        // Getter y setter de bibliotecariCap

        public function getBibliotecariCap()
        {
            return $this->bibliotecariCap;
        }

        public function setBibliotecariCap($bibliotecariCap)
        {
            $this->bibliotecariCap = $bibliotecariCap;
        }

        // Método para crear un bibliotecario

        public function crearBibliotecari()
        {
            // Leer los datos del formulario

            $this->nombre = $_POST["nombre"];
            $this->apellido1 = $_POST["apellido1"];
            $this->apellido2 = $_POST["apellido2"];
            $this->residencia = $_POST["residencia"];
            $this->telefono = $_POST["telefono"];
            $this->idBibliotecari = $_POST["idBibliotecari"];
            $this->contrasena = $_POST["contrasena"];
            $this->numSS = $_POST["numSS"];
            $this->primerDiaBibliotecari = $_POST["primerDiaBibliotecari"];
            $this->salari = $_POST["salari"];
            $this->bibliotecariCap = $_POST["bibliotecariCap"];

            // Crear un objeto de la clase LLibres
        }
    }
?>