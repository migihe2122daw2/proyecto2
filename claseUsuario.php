<?php 

    // Crear clase usuario

    class Usuario{

        // Atributos

        public $nombre = "";
        public $apellido1 = "";
        public $apellido2 = "";
        public $residencia = "";
        public $email = "";
        public $telefono = "";
        public $idPersonal = "";
        public $contrasena = "";
        public $prestado false;
        public $fechaPrestamo = "";
        public $ISBN = "";

        // Constructor

        public function __construct($nombre, $apellido1, $apellido2, $residencia, $email, $telefono, $idPersonal, $contrasena, $prestado, $fechaPrestamo, $ISBN){
            $this->nombre = $nombre;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->residencia = $residencia;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->idPersonal = $idPersonal;
            $this->contrasena = $contrasena;
            $this->prestado = $prestado;
            $this->fechaPrestamo = $fechaPrestamo;
            $this->ISBN = $ISBN;
        }

        // Métodos

        

    }

?>