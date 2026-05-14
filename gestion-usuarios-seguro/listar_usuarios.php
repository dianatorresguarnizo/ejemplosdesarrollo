<?php
    
    //include ("conexion.php");
    //Recomienda llamar al archivo de conexión 
    require_once("conexion.php");

    $sql = "SELECT id, nombre, apellidos, correo FROM usuarios"; // Seleccionamos solo campos necesarios
    $resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    </head> 

    <body class="bg-light">
        <div class="container mt-6"> 
            <h2 class="text-center mb-4">Usuarios Registrados</h2>
            
            <?php
            if ($resultado->num_rows > 0) {
                // Clases de Bootstrap para la tabla: table-striped (filas alternas), table-hover (efecto hover)
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped table-hover shadow-sm'>";
                echo "<thead class='table-dark'>"; // Estilo oscuro para el encabezado
                echo "<tr><th>Nombre</th><th>Apellidos</th><th>Correo</th><th>Acciones</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    
                    // SEGURIDAD: ESCAPAR LA SALIDA para prevenir XSS
                    $id_esc = htmlspecialchars($fila['id']);
                    $nombre_esc = htmlspecialchars($fila['nombre']);
                    $apellidos_esc = htmlspecialchars($fila['apellidos']);
                    $correo_esc = htmlspecialchars($fila['correo']);
                    
                    echo "<tr>";
                    echo "<td>{$nombre_esc}</td>";
                    echo "<td>{$apellidos_esc}</td>";
                    echo "<td>{$correo_esc}</td>";
                    echo "<td>
                        <a href='editar.php?id={$id_esc}' class='btn btn-info btn-sm me-2'>Actualizar</a> 
                        <a href='borrar.php?id={$id_esc}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Deseas eliminar este usuario?\")'>Borrar</a>
                    </td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>"; // Cierre de table-responsive
            } else {
                echo "<div class='alert alert-info text-center' role='alert'>No hay usuarios registrados.</div>";
            }
            $conexion->close();
            ?>

            <div class="text-center mt-4">
                <a href="registrar_usuario.html" class="btn btn-secondary">Registrar Nuevo Usuario</a>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous">
    </script>
    </body>
</html>