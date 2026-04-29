<?php
    include("conexion.php");

    $sql = "SELECT * FROM comentarios ORDER BY id DESC";
    $resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libro de comentarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">
        <h1>Libro de comentarios</h1>

        <form action="guardar.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Comentario:</label>
            <textarea name="comentario" rows="5" required></textarea>

            <button type="submit">Guardar comentario</button>
        </form>

        <h2>Comentarios registrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Comentario</th>
                <th>Fecha</th>
            </tr>

            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["comentario"]; ?></td>
                    <td><?php echo $fila["fecha_registro"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>