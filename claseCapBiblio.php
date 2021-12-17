<?php

    // Crear clase CapBibliotecari que herede de claseBibliotecari

    include_once "claseBibliotecari.php";
    include_once "claseLibro.php";

    class CapBibliotecari extends Bibliotecari
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

        /*public function crearBibliotecari()
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
        }*/

        
            // Método para crear un llibre a partir de los datos que se pasan por parámetro desde catalogo.php
        
                public function crearLlibreC($titolA, $autorA, $ISBNA, $prestecA, $inicprestecA, $codiusuariA){
                    // utilizar objeto de la clase Bibiliotecari
                    $capBiblio = new CapBibliotecari();
                    // Utilizar setters de la clase Libro
                    // Utilizar el métodos abstractos de la interficieLibro
                    $capBiblio->setTitol($titolA);
                    $capBiblio->setAutor($autorA);
                    $capBiblio->setISBN($ISBNA);
                    $capBiblio->setPrestec($prestecA);
                    $capBiblio->setIniciprestec($inicprestecA);
                    $capBiblio->setCodiusuari($codiusuariA);
                    $capBiblio->setIniciprestec($inicprestecA);
                    $capBiblio->setCodiUsuari($codiusuariA);
                    echo "<br>";
                    echo "El llibre " . $capBiblio->getTitol() . " ha estat creat correctament.";
        
        
                    // call funct to add txt
        
                    $capBiblio->crearLlibreBiblioteca();
        
        
                }

                // Metode per eliminar un llibre a partir del ISBN

                public function eliminarLlibreC($ISBNA){
                    // utilizar objeto de la clase Bibiliotecari
                    $capBiblio = new CapBibliotecari();
                    // Utilizar setters de la clase Libro
                    // Utilizar el métodos abstractos de la interficieLibro
                    $capBiblio->setISBN($ISBNA);
                    echo "<br>";
                    echo "El llibre " . $capBiblio->getTitol() . " ha estat eliminat correctament.";
        
        
                    // call funct to del txt
        
                    $capBiblio->eliminarLlibreBiblioteca();
        
        
                }
        public function modificarLibro(){
            
        }
    }
?>