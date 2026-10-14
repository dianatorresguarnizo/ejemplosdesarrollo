<?php

// Importar archivo de conexión
include("conexion.php");

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";

// query() ejecuta una consulta SQL simple
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <h2>Usuarios Registrados</h2>

    <?php

    // num_rows devuelve la cantidad de registros encontrados
    if ($resultado->num_rows > 0) {

        echo "<table>";

        echo "
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        ";

        // fetch_assoc() obtiene cada fila como un arreglo asociativo
        while ($fila = $resultado->fetch_assoc()) {

            // htmlspecialchars evita problemas de seguridad XSS
            $id = $fila['id'];
            $nombre = htmlspecialchars($fila['nombre']);
            $apellidos = htmlspecialchars($fila['apellidos']);
            $correo = htmlspecialchars($fila['correo']);

            echo "<tr>";

            echo "<td>$nombre</td>";
            echo "<td>$apellidos</td>";
            echo "<td>$correo</td>";

            echo "
                <td>
                    <a href='editar.php?id=$id'>Actualizar</a> |
                    
                    <a href='borrar.php?id=$id'
                    onclick='return confirm(\"¿Deseas eliminar este usuario?\")'>
                    Borrar
                    </a>
                </td>
            ";

            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "
            <p style='text-align:center; color:red;'>
                No hay usuarios registrados.
            </p>
        ";
    }

    // close() cierra la conexión con MySQL
    $conexion->close();

    ?>

</body>
</html>
