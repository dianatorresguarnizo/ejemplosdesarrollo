<?php

/* Ejemplo de función que no recibe parámetros*/
function saludar()
{
    echo "Buenas tardes"."<br>";
}

/*Funciones con parámetros*/

function saludo($nombre)
{
    echo "Buenas tardes ".$nombre."<br>";
}

function sumar($a, $b) 
{
    $c=$a+$b;
    return $c;
}

function restar($a, $b) 
{
    return $a-$b;
}

/*Función para saber si un número es par o impar*/


saludar ();
saludo ("diana");
saludo ("Juan");
$suma = sumar (9,5);
echo sumar (10,5);
echo "<br>";
echo $suma."<br>";
 $r = restar (9,5);
 echo $r."<br>";




?>