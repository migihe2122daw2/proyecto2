<?php

    class Libro{
        private $titol;
        private $autor;
        private $ISBN;
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

            while(!feof($arxiu)){
                $linea = fgets($arxiu);
            
                $llibre = explode(":", $linea);
                echo "<p>Titol: " . $llibre[0] . "</p>";
                echo "<p>Autor: " . $llibre[1] . "</p>";
                echo "<p>ISBN: " . $llibre[2] . "</p>";
                echo "<p>Prestec: " . $llibre[3] . "</p>";
                echo "<p>Inici prestec: " . $llibre[4] . "</p>";
                echo "<p>Codi usuari: " . $llibre[5] . "</p>";
                echo "<br>";

                // Comprovar si hay libro

                if ($llibre[0] == "" && $llibre[1] == "" && $llibre[2] == "" && $llibre[3] == "" && $llibre[4] == "" && $llibre[5] == "") {
                    fclose($arxiu);
                    break;
                }
            }
            
        }

        // Metode per crear un nou llibre al fitxer de text

        public function crearLlibre(){
            $fitxer = fopen("Llibres.txt", "a");
            // Preguntar els dades del llibre

            echo "<p>Introdueix el titol del llibre: </p>";
            echo "<form action='claseLibro.php' method='post'>";
            echo "<input type='text' name='titol'><br>";

            echo "<p>Introdueix el autor del llibre: </p>";
            echo "<input type='text' name='autor'><br>";
            
            echo "<p>Introdueix el ISBN del llibre: </p>";
            echo "<input type='text' name='ISBN'><br>";

            echo "<p>Introdueix si el llibre es prestarà: </p>";
            echo "<input type='checkbox' name='prestec'><br>";

            echo "<p>Introdueix la data d'inici del prestec: </p>";
            echo "<input type='date' name='inicprestec'><br>";

            echo "<p>Introdueix el codi de l'usuari: </p>";
            echo "<input type='text' name='codiusuari'><br>";

            echo "<input type='submit' value='Crear llibre'>";
            echo "</form>";

            // Crear el llibre

            if (isset($_POST['titol'])) {
                $titolCrear = $_POST['titol'];
                $autorCrear = $_POST['autor'];
                $ISBNCrear = $_POST['ISBN'];
                $prestecCrear = $_POST['prestec'];
                $iniciprestecCrear = $_POST['inicprestec'];
                $codiusuariCrear = $_POST['codiusuari'];

                // Mostrar el llibre creat per pantalla

                echo "<p>Titol: " . $titolCrear . "</p>";
                echo "<p>Autor: " . $autorCrear . "</p>";
                echo "<p>ISBN: " . $ISBNCrear . "</p>";
                echo "<p>Prestec: " . $prestecCrear . "</p>";
                echo "<p>Inici prestec: " . $iniciprestecCrear . "</p>";
                echo "<p>Codi usuari: " . $codiusuariCrear . "</p>";

                $linea = $titolCrear . ":" . $autorCrear . ":" . $ISBNCrear . ":" . $prestecCrear . ":" . $iniciprestecCrear . ":" . $codiusuariCrear . "\n";
                fwrite($fitxer, $linea);
            }

            fclose($fitxer);
        }

        // Metode per modificar el llibre


        
    }
?>