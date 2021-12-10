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
        public $prestado = "";
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

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido1(){
            return $this->apellido1;
        }

        public function getApellido2(){
            return $this->apellido2;
        }

        public function getResidencia(){
            return $this->residencia;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getIdPersonal(){
            return $this->idPersonal;
        }

        public function getContrasena(){
            return $this->contrasena;
        }

        public function getPrestado(){
            return $this->prestado;
        }

        public function getFechaPrestamo(){
            return $this->fechaPrestamo;
        }

        public function getISBN(){
            return $this->ISBN;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido1($apellido1){
            $this->apellido1 = $apellido1;
        }

        public function setApellido2($apellido2){
            $this->apellido2 = $apellido2;
        }

        public function setResidencia($residencia){
            $this->residencia = $residencia;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function setIdPersonal($idPersonal){
            $this->idPersonal = $idPersonal;
        }

        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
        }

        public function setPrestado($prestado){
            $this->prestado = $prestado;
        }

        public function setFechaPrestamo($fechaPrestamo){
            $this->fechaPrestamo = $fechaPrestamo;
        }

        public function setISBN($ISBN){
            $this->ISBN = $ISBN;
        }

        public function toString(){
            return "Nombre: " . $this->nombre . " Apellido1: " . $this->apellido1 . " Apellido2: " . $this->apellido2 . " Residencia: " . $this->residencia . " Email: " . $this->email . " Telefono: " . $this->telefono . " IdPersonal: " . $this->idPersonal . " Contraseña: " . $this->contrasena . " Prestado: " . $this->prestado . " FechaPrestamo: " . $this->fechaPrestamo . " ISBN: " . $this->ISBN;
        }
/*
        // Método para crear un usuario y meterlo en Ususarios.txt

        public static function crearUsuario($nombre, $apellido1, $apellido2, $residencia, $email, $telefono, $idPersonal, $contrasena, $prestado, $fechaPrestamo, $ISBN){
            $usuario = new Usuario($nombre, $apellido1, $apellido2, $residencia, $email, $telefono, $idPersonal, $contrasena, $prestado, $fechaPrestamo, $ISBN);
            $usuario->guardarUsuario();
        }

        // Método para guardar un usuario en Ususarios.txt

        public function guardarUsuario(){
            $archivo = fopen("Usuarios.txt", "a");
            fwrite($archivo, $this->toString() . PHP_EOL);
            fclose($archivo);
        }
*/
        // Método para leer un usuario por su idPersonal´

        public static function leerUsuario($idPersonal){
            $archivo = fopen("Usuarios.txt", "r");
            while(!feof($archivo)){
                $linea = fgets($archivo);
                $datos = explode("-", $linea);
                if($datos[6] == $idPersonal){
                    $usuario = new Usuario($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10]);
                    fclose($archivo);
                    return $usuario;
                }
            }
            fclose($archivo);
        }

    }

?>