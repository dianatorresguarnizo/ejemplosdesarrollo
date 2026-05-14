<?php
   
    //include ("conexion.php");
    //Recomienda llamar al archivo de conexión 
    require_once("conexion.php");
    
    // 1. SANITIZACIÓN Y VALIDACIÓN DE ENTRADAS
    // htmlspecialchars previene XSS. trim elimina espacios en blanco innecesarios.
    $nombre = htmlspecialchars(trim($_POST['nombre'])); 
    $apellidos = htmlspecialchars(trim($_POST['apellidos'])); 
    
    // filter_var limpia el correo de caracteres no válidos.
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL); 
    
    $clave_plana = $_POST['clave']; // Contraseña recibida del formulario

    // 2. HASHEO DE LA CONTRASEÑA (CRUCIAL)
    // Usamos PASSWORD_DEFAULT paras la mejor protección actual.
    $clave_hashed = password_hash($clave_plana, PASSWORD_DEFAULT); 

    // Verificar si el correo ya existe
    $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $verificar->bind_param("s", $correo);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        // Escapar el mensaje de error por precaución
        echo "<p style='text-align:center; color:red;'>" . htmlspecialchars("El correo ya está registrado.") . "</p>";
    } else {
        // Inserción del nuevo usuario con la clave hasheada
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, clave) VALUES (?, ?, ?, ?)");
        // Usamos la variable $clave_hashed en lugar de la plana $clave
        $stmt->bind_param("ssss", $nombre, $apellidos, $correo, $clave_hashed); 
        
        if ($stmt->execute()) {
            echo "<p style='text-align:center; color:green;'>" . htmlspecialchars("Usuario registrado correctamente.") . "</p>";
            echo "<p style='text-align:center;'><a href='listar_usuarios.php'>Ver lista de usuarios</a></p>";
        } else {
            echo "<p style='text-align:center; color:red;'>" . htmlspecialchars("Error al registrar el usuario.") . "</p>";
        }
        $stmt->close();
    }
    $verificar->close();
    $conexion->close();
?>