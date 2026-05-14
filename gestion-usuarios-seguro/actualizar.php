<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "usuariosdb");
    if ($conexion->connect_error) die("Error de conexión");

    // 1. SANITIZACIÓN DE ENTRADAS
    $id = intval($_POST['id']);
    $nombre = htmlspecialchars(trim($_POST['nombre'])); 
    $apellidos = htmlspecialchars(trim($_POST['apellidos'])); 
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL); 

    // 2. Sentencia preparada (Correcta, sin inyección SQL)
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, correo = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre, $apellidos, $correo, $id);

    if ($stmt->execute()) {
        header("Location: listar_usuarios.php");
        exit; // IMPORTANTE: Detener la ejecución después de la redirección
    } else {
        echo "Error al actualizar el usuario.";
    }

    $stmt->close();
    $conexion->close();
}
?>