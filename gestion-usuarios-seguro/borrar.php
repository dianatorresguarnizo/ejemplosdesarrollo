<?php
if (isset($_GET['id'])) {
    $conexion = new mysqli("localhost", "root", "", "usuariosdb");
    if ($conexion->connect_error) die("Error de conexión");

    // Uso de intval() y Sentencia Preparada (ya estaba, ¡bien!)
    $id = intval($_GET['id']);
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar_usuarios.php");
        exit; // IMPORTANTE: Detener la ejecución después de la redirección
    } else {
        echo "Error al borrar el usuario.";
    }
    $stmt->close();
    $conexion->close();
}
// NOTA: Para una seguridad superior (CSRF), esta acción debería usar POST.
?>