<?php

function saludo() {
  echo "<h3>Hola</h3>";
}

echo saludo();

function saludar($nombre) {
  echo "<h3>Hola ".$nombre."</h3>";
}

echo saludar("Juan");

function CalcularPrecioTotal($precio, $cantidad) {
  $total = $precio * $cantidad;
  return $total;
}

echo CalcularPrecioTotal(10, 5);

function Sumar($a, $b) {
  return $a + $b;
}

$suma= Sumar(5, 10);

echo "<h3>La suma es: ".$suma."</h3>";

echo $suma * 2;

function SaludarNombre($nombre = "Invitado") {
  echo "<h3>Hola ".$nombre." </h3>";
}

echo SaludarNombre();

echo SaludarNombre("Pedro");

$precio = 10;

function DuplicarPrecio($precio) {
  $precio;
  $precio = $precio * 2;
  return $precio;
}

echo DuplicarPrecio($precio);

echo "<h3>El precio es: ".$precio."</h3>";
?>