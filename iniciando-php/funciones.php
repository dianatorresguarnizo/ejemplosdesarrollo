<?php

    //Funciones PHP
    function suma($a, $b) {
        return $a + $b;
    }

    echo suma(5, 10);
    echo "<br>";
    echo suma(10, 20);

    function CalcularAreaRectangulo($base, $altura) {
        return $base * $altura;
    }
    echo "<br>";
    echo CalcularAreaRectangulo(5, 10);

    function saludar() {
        return "Hola Mundo desde una función";
    }
    echo "<br>";
    echo saludar();

    function saludando() {
        echo "Hola Mundo 2";
        echo "Hola Mundo 2";
        echo "Hola Mundo 2";
        echo "Hola Mundo 2";
    }
    echo "<br>";
    saludando();

    function saludo($nombre) {
        echo "Hola mi nombre es: ".$nombre;
    }
    echo "<br>";
    saludo("Juan");
    
    saludo("Diana");
    echo "<br>";
    echo "<br>";
    echo "<hr>";

    function suma2($a, $b) {
        return $a + $b;
    }
    
    $s = suma2(5, 10);

    function multiplicar($a, $b) {
        return $a * $b;
    }

    $m = multiplicar($s,$s);
    
    echo $m;

     echo "<hr>";

    function despido($nombre="Visitante") {
        echo "<h3>Adiós ".$nombre."</h3>";
    }

    despido("Juan");
    echo "<br>";
    despido("Diana");
    echo "<br>";

    despido();

    echo "<hr>";

    $numero = 5;
    
    function duplicar($numero) {
        return $numero * 2;
    }

    echo duplicar($numero);
    echo "<hr>";
    echo $numero;



?>