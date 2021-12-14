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
        // Método sumar 2 numeros

        public static function sumar($num1, $num2){
            return $num1 + $num2;
        }

        // Método para mostrar el usuario segun su usuario y contrasena

        public static function mostrar($usuario, $contrasena){

            // Abrir el archivo en modo lectura

            $fitxer_usuaris="usuariPersonal.txt";
            $fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer=filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
            }

            // Buscar el usuario con el usuario y contrasena que se le pasa por parametro

            $usuari_validat = false;
            $contador = 0;

            while (($usuari_validat == false) && ($contador < count($usuaris))) {
                $usuari = explode(":", $usuaris[$contador]);
                if (($usuari[6] == $usuario) && ($usuari[7] == $contrasena)) {
                    $usuari_validat = true;
                }
                $contador++;
            }

            // Si el usuario es valido, mostrar los datos del usuario

            if ($usuari_validat == true) {
                $usuari = explode(":", $usuaris[$contador - 1]);
                echo "Nombre: " . $usuari[2] . "<br>" .
                    "Apellido1: " . $usuari[3] . "<br>" .
                    "Apellido2: " . $usuari[4] . "<br>" .
                    "Residencia: " . $usuari[5] . "<br>" .
                    "Email: " . $usuari[6] . "<br>" .
                    "Telefono: " . $usuari[7] . "<br>" .
                    "IdPersonal: " . $usuari[8] . "<br>" .
                    "Contrasena: " . $usuari[9] . "<br>" .
                    "Prestado: " . $usuari[10] . "<br>" .
                    "FechaPrestamo: " . $usuari[11] . "<br>" .
                    "ISBN: " . $usuari[12] . "<br>";
            } else {
                echo "Usuari o contrasena incorrectes";
            }


            

            /*foreach ($usuaris as $usuari) {
                $datos = explode(":", $usuari);

                if ($datos[6] ?? "" == $usuario && $datos[7] == $contrasena) {
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
                    // return $usuari;
                    return $usuari;
                }
            }*/
            fclose($fp);
        }

    }

?>