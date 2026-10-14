<?php
    include("conexion.php");

    $nombre = $_POST["nombre"];
    $comentario = $_POST["comentario"];

    $sql = "INSERT INTO comentarios (nombre, comentario)
            VALUES ('$nombre', '$comentario')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al guardar el comentario: " . $conexion->error;
    }

    $conexion->close();
?>