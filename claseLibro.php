<?php

ob_clean();

include_once "claseUsuario.php";

    class Libro extends Usuario{
        private $titol;
        private $autor;
        public $ISBN;
        private $prestec;
        private $iniciprestec;
        private $codiusuari;


        // Constructor por defecto

        public function __construct(){
            $this->titol = "";
            $this->autor = "";
            $this->ISBN = "";
            $this->prestec = false;
            $this->inicprestec = "";
            $this->codiusuari = "";
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

            // Mostrar els llibres de l'arxiu de text en una taula

            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Titol</th>";
            echo "<th>Autor</th>";
            echo "<th>ISBN</th>";
            echo "<th>Prestec</th>";
            echo "<th>Inici prestec</th>";
            echo "<th>Codi usuari</th>";
            echo "</tr>";

            while (!feof($arxiu)) {
                $linea = fgets($arxiu);
                $llibre = explode(":", $linea);
                echo "<tr>";
                echo "<td>$llibre[0]</td>";
                echo "<td>$llibre[1]</td>";
                echo "<td>$llibre[2]</td>";
                echo "<td>$llibre[3]</td>";
                echo "<td>$llibre[4]</td>";
                echo "<td>$llibre[5]</td>";
                echo "</tr>";
            }
        }


        // Metode per crear un nou llibre al fitxer de text desde la clase Biblioteca

        public function crearLlibreBiblioteca(){
            $fitxer = fopen("Llibres.txt", "a");
            
            // Usar getters per obtenir els valors dels atributs de la clase

            $titolC = $this->getTitol();
            $autorC = $this->getAutor();
            $ISBNC = $this->getISBN();
            $prestecC = $this->getPrestec();
            $iniciprestecC = $this->getIniciprestec();
            $codiusuariC = $this->getCodiusuari();

            // Hacer un enter antes de cada llibre si no s'ha fet abans per a que no hi hagi problemes de lectura

            fwrite($fitxer, "\n");

            // comprobar si prestec es true o false

            if ($prestecC) {
                $prestecC = "true";
            } else {
                $prestecC = "false";
            }

            // Si el prestec es true, mostrar la data de inici de prestec, si no mostrar un 0

            if ($prestecC == "true") {
                $iniciprestecC;
                if ($iniciprestecC == "") {

                    // Limpiar la pantalla 

                    ob_clean();
                    echo "No has introduit cap data de prestec";
                    header("Refresh: 3 catalegbiblio.php?mostrar=crear");
                }else{

                    // Haz un set de Prestec y de Inicprestec

                    $this->setPrestec($prestecC);
                    $this->setIniciprestec($iniciprestecC);

                }
            } else {
                $iniciprestecC = "0";
            }

            // Escriure els valors dels atributs a l'arxiu de text

            fwrite($fitxer, $titolC . ":" . $autorC . ":" . $ISBNC . ":" . $prestecC . ":" . $iniciprestecC . ":" . $codiusuariC);

            // Metode per asignar el prestec a un usuari utilitzant el codi de l'usuari

            $fitxer2 = fopen("usuariPersonal.txt", "r");

            while (!feof($fitxer2)) {
                $linea = fgets($fitxer2);
                $usuari = explode(":", $linea);
                if ($usuari[6] == $codiusuariC) {

                    // Modificar el prestec del usuari

                    $usuari[8] = $prestecC;
                    $usuari[9] = $iniciprestecC;
                    $usuari[10] = $ISBNC;

                    // Instanciar un nou objecte usuari

                    $usuari2 = new Usuario();

                    // Assignar els valors dels atributs a l'objecte usuari

                    $usuari2->setPrestado($usuari[8]);
                    $usuari2->setFechaPrestamo($usuari[9]);
                    $usuari2->setISBN($usuari[10]);

                    // Escriure els valors dels atributs a l'arxiu de text

                    fwrite($fitxer2, $usuari2->getNombre() . ":" . $usuari2->getApellido1() . ":" . $usuari2->getApellido2() . ":" . $usuari2->getResidencia() . ":" . $usuari2->getEmail() . ":" . $usuari2->getTelefono() . ":" . $usuari2->getIdPersonal() . ":" . $usuari2->getContrasena() . ":" . $usuari2->getPrestado() . ":" . $usuari2->getFechaPrestamo() . ":" . $usuari2->getISBN());

                    // Mostrar un missatge de confirmacio

                    ob_clean();
                    echo "Llibre creat correctament";
                    header("Refresh: 3 catalegbiblio.php");
                                       
                }
            }

        }

        // Metodo para eliminar libros de la clase

        public function eliminarLlibreBiblioteca(){
            $fitxer = fopen("Llibres.txt", "r");
            $fitxer2 = fopen("Llibres2.txt", "w");
            while (!feof($fitxer)) {
                $linea = fgets($fitxer);
                $llibre = explode(":", $linea);
                if ($llibre[2] != $this->getISBN()) {
                    fwrite($fitxer2, $llibre[0] . ":" . $llibre[1] . ":" . $llibre[2] . ":" . $llibre[3] . ":" . $llibre[4] . ":" . $llibre[5]);
                }
            }

            fclose($fitxer);
            fclose($fitxer2);
            unlink("Llibres.txt");
            rename("Llibres2.txt", "Llibres.txt");
            
            $fitxer = fopen("Llibres.txt", "a+");

            // Obtenir la ultima linea del archivo

            $ultimaLinea = fgets($fitxer);

            // Obtenir el numero de caracteres de la ultima linea

            $numeroCaracteres = strlen($ultimaLinea);

            // Eliminar el \n de la ultima linea

            $ultimaLinea = substr($ultimaLinea, 0, $numeroCaracteres - 1);
        
        }

        // Metodo prestec llibre

        public function prestecLlibreBiblioteca($codiusuariB){

            // Comparar el codi de l'usuari que esta intentant prestar el llibre amb els ususaris

            $fitxer = fopen("usuariPersonal.txt", "r");
            $fitxer2 = fopen("usuariPersonal2.txt", "w");

            while (!feof($fitxer)) {
                $linea = fgets($fitxer);
                $usuari = explode(":", $linea);
                if ($usuari[6] == $codiusuariB) {

                    // Si hay una fecha de prestamo, pero prestamo es caulquier cosa que no sea true, mostrar un missatge de error

                    if ($usuari[8] == "false") {
                        ob_clean();
                        
                        // Cambiar las variables de prestec y inicprestec del usuario

                        $usuario2 = new Usuario();

                        $usuario2->setPrestado($this->getPrestec());
                        $usuario2->setFechaPrestamo($this->getIniciprestec());
                        $usuario2->setISBN($this->getISBN());

                        // Escriure els valors dels atributs a l'arxiu de text

                        $usuario2->setNombre($usuari[0]);
                        $usuario2->setApellido1($usuari[1]);
                        $usuario2->setApellido2($usuari[2]);
                        $usuario2->setResidencia($usuari[3]);
                        $usuario2->setEmail($usuari[4]);
                        $usuario2->setTelefono($usuari[5]);
                        $usuario2->setIdPersonal($usuari[6]);
                        $usuario2->setContrasena($usuari[7]);

             
                        fwrite($fitxer2, $usuario2->getNombre() . ":" . $usuario2->getApellido1() . ":" . $usuario2->getApellido2() . ":" . $usuario2->getResidencia() . ":" . $usuario2->getEmail() . ":" . $usuario2->getTelefono() . ":" . $usuario2->getIdPersonal() . ":" . $usuario2->getContrasena() . ":" . $usuario2->getPrestado() . ":" . $usuario2->getFechaPrestamo() . ":" . $usuario2->getISBN() . "\n");
                    } else {
                        echo "Prestec incorrecte";
                        // Eliminar fitxer temporal
                        unlink("usuariPersonal2.txt");
                        header("Refresh: 3 catalegbiblio.php");
                    }
                }

                // Reescribir los demas usuarios

                else {
                    fwrite($fitxer2, $usuari[0] . ":" . $usuari[1] . ":" . $usuari[2] . ":" . $usuari[3] . ":" . $usuari[4] . ":" . $usuari[5] . ":" . $usuari[6] . ":" . $usuari[7] . ":" . $usuari[8] . ":" . $usuari[9] . ":" . $usuari[10]);
                }
            }

            fclose($fitxer);
            fclose($fitxer2);

            unlink("usuariPersonal.txt");
            rename("usuariPersonal2.txt", "usuariPersonal.txt");
        }

        // Metodo para modificar libros de la clase

        public function modificarLlibreBiblioteca($isbn, $prestado, $inicprestec, $codiusuari){
            $fitxer = fopen("Llibres.txt", "r");
            $fitxer2 = fopen("Llibres2.txt", "w");
            
            // CAmbia el estado de prestamo del libro y usuario asociado al libro

            // Buscar el libro con el ISBN que se quiere modificar 

            while (!feof($fitxer)) {
                $linea = fgets($fitxer);
                $llibre = explode(":", $linea);
                if ($llibre[2] == $isbn) {

                    // Cambiar el estado del checkbox a true o false

                    if($prestado == "on"){
                        $prestado = "true";
                    } else {
                        $prestado = "false";
                    }


                    // Si prestamo es false y inicprestec es vacio, asinganrles un 0

                    if ($prestado == "false" && $inicprestec == "") {
                        $inicprestec = "0";
                        $codiusuari = "0";
                        $isbn = "0";
                    }


                    fwrite($fitxer2, $llibre[0] . ":" . $llibre[1] . ":" . $llibre[2] . ":" . $prestado . ":" . $inicprestec . ":" . "$codiusuari");
                } else {
                    fwrite($fitxer2, $llibre[0] . ":" . $llibre[1] . ":" . $llibre[2] . ":" . $llibre[3] . ":" . $llibre[4] . ":" . $llibre[5]);    
                }
            }

            fclose($fitxer);
            fclose($fitxer2);

            unlink("Llibres.txt");
            rename("Llibres2.txt", "Llibres.txt");

            // Modificar el estado del usuario

            $fitxer = fopen("usuariPersonal.txt", "r");
            $fitxer2 = fopen("usuariPersonal2.txt", "w");

            while (!feof($fitxer)) {
                $linea = fgets($fitxer);
                $usuari = explode(":", $linea);
                if ($usuari[6] == $codiusuari) {
                    if($prestado == "on"){
                        $prestado = "true";
                    } else {
                        $prestado = "false";
                    }
                    if ($prestado == "false" && $inicprestec == "") {
                        $inicprestec = "0";
                        $codiusuari = "0";
                        $isbn = "0";
                    }
                    fwrite($fitxer2, $usuari[0] . ":" . $usuari[1] . ":" . $usuari[2] . ":" . $usuari[3] . ":" . $usuari[4] . ":" . $usuari[5] . ":" . $usuari[6] . ":" . $usuari[7] . ":" . $prestado . ":" . $inicprestec . ":" . $isbn);
                } else {
                    fwrite($fitxer2, $usuari[0] . ":" . $usuari[1] . ":" . $usuari[2] . ":" . $usuari[3] . ":" . $usuari[4] . ":" . $usuari[5] . ":" . $usuari[6] . ":" . $usuari[7] . ":" . $usuari[8] . ":" . $usuari[9] . ":" . $usuari[10]);
                }
            }

        }

    



    }
?>