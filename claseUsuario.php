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

        public function visualizarUsuarios()
        {
            // Leer el archivo de usuarios

            $fitxer_usuaris = "usuariPersonal.txt";
            $fp = fopen($fitxer_usuaris, "r") or die("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer = filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp, $mida_fitxer));
            }

            // Mostrar todos los usuarios en una tabla

            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido1</th>";
            echo "<th>Apellido2</th>";
            echo "<th>Residencia</th>";
            echo "<th>Email</th>";
            echo "<th>Telefono</th>";
            echo "<th>IdPersonal</th>";
            echo "<th>Contrasena</th>";
            echo "<th>Prestado</th>";
            echo "<th>FechaPrestamo</th>";
            echo "<th>ISBN</th>";
            echo "</tr>";
            
            foreach ($usuaris as $usuari) {
                $datos = explode(":", $usuari);

                echo "<tr>";
                echo "<td>" . $datos[0] . "</td>";
                echo "<td>" . $datos[1] . "</td>";
                echo "<td>" . $datos[2] . "</td>";
                echo "<td>" . $datos[3] . "</td>";
                echo "<td>" . $datos[4] . "</td>";
                echo "<td>" . $datos[5] . "</td>";
                echo "<td>" . $datos[6] . "</td>";
                echo "<td>" . $datos[7] . "</td>";
                echo "<td>" . $datos[8] . "</td>";
                echo "<td>" . $datos[9] . "</td>";
                echo "<td>" . $datos[10] . "</td>";
                echo "</tr>";
                echo "<br>";

            }
            echo "</table>";
            fclose($fp);

            // boton para guardar los usuarios en un pdf


            require_once('vendor/autoload.php');
            

            



        }

        // Metodo para crear usuarios

        public static function crearUsuario($nombre, $apellido1, $apellido2, $residencia, $email, $telefono, $idPersonal, $contrasena, $prestado, $fechaPrestamo, $ISBN){

            // Abrir el archivo en modo lectura

            $fitxer_usuaris="usuariPersonal.txt";
            $fp=fopen($fitxer_usuaris, "rb") or die("No s'ha pogut validar l'usuari");

            if ($fp) {
                $mida_fitxer=filesize($fitxer_usuaris);
                $usuaris = explode(PHP_EOL, fread($fp, $mida_fitxer));
            }

            // Crear un nuevo usuario

            $usuari = new Usuario();

            // set de los datos del usuario

            $usuari->setNombre($nombre);
            $usuari->setApellido1($apellido1);
            $usuari->setApellido2($apellido2);
            $usuari->setResidencia($residencia);
            $usuari->setEmail($email);
            $usuari->setTelefono($telefono);
            $usuari->setIdPersonal($idPersonal);
            $usuari->setContrasena($contrasena);
            $usuari->setPrestado($prestado);
            $usuari->setFechaPrestamo($fechaPrestamo);
            $usuari->setISBN($ISBN);

            // Pasar a string el usuario
            $usuari = $usuari->toString();

            // Añadir el usuario al archivo

            $usuaris[] = $usuari;

            // Guardar el archivo

            $fitxer_usuaris="usuariPersonal.txt";
            $fp=fopen($fitxer_usuaris, "wb") or die("No s'ha pogut validar l'usuari");

            if ($fp) {
                foreach ($usuaris as $usuari) {
                    fwrite($fp, $usuari . PHP_EOL);
                }
            }
            fclose($fp);
        }
    }

?>