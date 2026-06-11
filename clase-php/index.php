<?php

    class Estudiante
    {
        private string $nombre;
        private string $cedula;
        private string $carrera;
        private int $edad;

        public function __construct(string $nombre, string $cedula, string $carrera, int $edad)
        {
            $this->nombre = $nombre;
            $this->cedula = $cedula;
            $this->carrera = $carrera;
            $this->edad = $edad;
        }

        public function mostrarInformacion(): void
        {
            echo "<h2>Información del estudiante</h2>";
            echo "Nombre: " . $this->nombre . "<br>";
            echo "Cédula: " . $this->cedula . "<br>";
            echo "Carrera: " . $this->carrera . "<br>";
            echo "Edad: " . $this->edad . " años<br>";
        }

        public function esMayorDeEdad(): bool
        {
            return $this->edad >= 18;
        }
    }

    $estudiante1 = new Estudiante(
        "María Torres",
        "1101234567",
        "Computación",
        20
    );

     $estudiante2 = new Estudiante(
        "Diana Torres",
        "11012234",
        "Derecho",
        4
    );
    
    $estudiante1->mostrarInformacion();

    if ($estudiante1->esMayorDeEdad()) {
        echo "El estudiante es mayor de edad.";
    } else {
        echo "El estudiante es menor de edad.";
    }
    $estudiante2->mostrarInformacion();
    
    if ($estudiante2->esMayorDeEdad()) {
        echo "El estudiante es mayor de edad.";
    } else {
        echo "El estudiante es menor de edad.";
        
    }

?>