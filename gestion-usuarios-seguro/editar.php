<?php
    if (isset($_GET['id'])) {
        $conexion = new mysqli("localhost", "root", "", "usuariosdb");
        if ($conexion->connect_error) die("Error de conexión");

        // Uso de intval() y Sentencia Preparada (ya estaba, ¡bien!)
        $id = intval($_GET['id']);
        $stmt = $conexion->prepare("SELECT nombre, apellidos, correo FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
    }
    // Manejo de caso en que el usuario no exista o no haya ID
    if (!isset($usuario)) {
        // Es buena práctica redirigir o mostrar un error claro si el ID no es válido
        die("Usuario no encontrado o ID no válido.");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Editar Usuario</h4>
                </div>

                <div class="card-body">
                    <form action="actualizar.php" method="POST">

                        <input 
                            type="hidden" 
                            name="id" 
                            value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>"
                        >

                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input 
                                type="text" 
                                name="nombre" 
                                class="form-control"
                                value="<?= htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8') ?>" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellidos:</label>
                            <input 
                                type="text" 
                                name="apellidos" 
                                class="form-control"
                                value="<?= htmlspecialchars($usuario['apellidos'], ENT_QUOTES, 'UTF-8') ?>" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo:</label>
                            <input 
                                type="email" 
                                name="correo" 
                                class="form-control"
                                value="<?= htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8') ?>" 
                                required
                            >
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                Actualizar Usuario
                            </button>

                            <a href="listar_usuarios.php" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>