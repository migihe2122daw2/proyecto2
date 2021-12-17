<?php

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

                    // Si el prestec es true, mostrar si esta en prestamo, si no mostrar false, la data de inici de prestec, si no mostrar un 0 i el ISBN del llibre, si no mostrar un 0

                    if($prestecC == "true"){
                        // Mostrar si esta en prestamo, si no mostrar false, la data de inici de prestec, si no mostrar un 0 i el ISBN del llibre, si no mostrar un 0

                        // Cambiar el archivo de usuariPersonal.txt per a que el prestec sigui true

                        while(!feof($fitxer2)){
                            $linea = fgets($fitxer2);
                            $usuari = explode(":", $linea);
                            if($usuari[6] == $codiusuariC){
                                $usuari[8] = "true";
                                $usuari[9] = $iniciprestecC;
                                $usuari[10] = $ISBNC;
                            }else{
                                $usuari[8] = "false";
                                $usuari[9] = "0";
                                $usuari[10] = "0";
                            }
                            $fitxer3 = fopen("usuariPersonal.txt", "w");
                            fwrite($fitxer3, $usuari[0] . ":" . $usuari[1] . ":" . $usuari[2] . ":" . $usuari[3] . ":" . $usuari[4] . ":" . $usuari[5] . ":" . $usuari[6] . ":" . $usuari[7] . ":" . $usuari[8] . ":" . $usuari[9] . ":" . $usuari[10]);
                        }
                    }


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

        // Metodo para quitar el \n del final de la ultima linea del archivo

    



    }
?>