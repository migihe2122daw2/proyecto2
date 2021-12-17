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

        public function __construct(){
            $this->nombre = "";
            $this->apellido1 = "";
            $this->apellido2 = "";
            $this->residencia = "";
            $this->email = "";
            $this->telefono = "";
            $this->idPersonal = "";
            $this->contrasena = "";
            $this->prestado = "";
            $this->fechaPrestamo = "";
            $this->ISBN = "";
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
            return "Nombre: " . $this->nombre . "<br>" .
                    "Apellido1: " . $this->apellido1 . "<br>" .
                    "Apellido2: " . $this->apellido2 . "<br>" .
                    "Residencia: " . $this->residencia . "<br>" .
                    "Email: " . $this->email . "<br>" .
                    "Telefono: " . $this->telefono . "<br>" .
                    "IdPersonal: " . $this->idPersonal . "<br>" .
                    "Contrasena: " . $this->contrasena . "<br>" .
                    "Prestado: " . $this->prestado . "<br>" .
                    "FechaPrestamo: " . $this->fechaPrestamo . "<br>" .
                    "ISBN: " . $this->ISBN . "<br>";
        }

        // Método para mostrar el usuario segun su usuario y contrasena

        public static function mostrarUsuario($usuario, $contrasena){

            // Abrir el archivo en modo lectura

            $fitxer_usuaris="usuariPersonal.txt";
            $fp=fopen($fitxer_usuaris,"rb") or die ("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer=filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
            }
            
            foreach ($usuaris as $usuari) {
                $datos = explode(":", $usuari);

                if ($datos[6] == $usuario && $datos[7] == $contrasena) {
                    $usuari = new Usuario();

                    // set de los datos del usuario

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

                    // Pasar a string el usuario
                    $usuari = $usuari->toString();
                    // return 

                    return $usuari;
                }
            }
            fclose($fp);
        }
    }

?>