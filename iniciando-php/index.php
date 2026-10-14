<h1>Mi primer programa en PHP</h1>
<?php
  //Mi primer programa en PHP
  echo "Hola mundo desde PHP. "."<br>";
  echo "<h3>Test 1</h3>";
  echo "<h3>"."Test 2"."</h3>";
  /*   
    Comentario de varias lineas
    Comentario de varias lineas
   */ 
  //Variables
  $edad = 15;
  $nombre = "Juan";

  echo "<h3>Mi nombre es: ".$nombre." y mi edad es: ".$edad."</h3>";  
  $precio_total = 100;

  echo "<h3>El precio total es: ".$precio_total."</h3>";

  if ($edad >= 18) {
    echo "<h3>Es mayor de edad</h3>";
  } else {
    echo "<h3>Es menor de edad</h3>";
  }

  $rol = "editors";
    switch ($rol) {
      case "admin":
        echo "<h3>Es administrador</h3>";
        break;
      case "editor":
        echo "<h3>Es editor</h3>";
        break;
      default:
        echo "<h3>No tiene rol asignado</h3>";
        break;
    }

    $i = 2;
    echo "WHILE: <br>";
    while ($i < 5) {
      echo "<h3>El valor de i es: ".$i."</h3>";
        $i++;
    }

    echo "DO WHILE: <br>";
    $i = 2;
    do {
      echo "<h3>El valor de i es: ".$i."</h3>";
        $i++;
    } while ($i < 5);
?>
<h2>Fin del programa</h2>