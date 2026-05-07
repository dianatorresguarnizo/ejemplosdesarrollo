<?php
    // include permite importar otro archivo PHP include("conexion.php");
    include("conexion.php");

    // Validar que los datos lleguen desde el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $correo = trim($_POST['correo']);
        $clave = $_POST['clave'];

        // password_hash cifra la contraseña antes de guardarla
        $clave_segura = password_hash($clave, PASSWORD_DEFAULT);

        // prepare crea una consulta preparada para evitar inyección SQL
        $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");

        // bind_param vincula el valor de la variable con el signo ? de la consulta
        // "s" significa que el dato enviado es de tipo string
        $verificar->bind_param("s", $correo);

        // execute ejecuta la consulta preparada
        $verificar->execute();

        // store_result guarda el resultado para poder contar las filas encontradas
        $verificar->store_result();

        // num_rows devuelve la cantidad de registros encontrados
        if ($verificar->num_rows > 0) {
            echo "<p style='text-align:center; color:red;'>El correo ya está registrado.</p>";
        } else {

            // Consulta preparada para insertar un nuevo usuario
            $stmt = $conexion->prepare(
                "INSERT INTO usuarios (nombre, apellidos, correo, clave) VALUES (?, ?, ?, ?)"
            );

            // Se vinculan los datos que serán insertados en la base de datos
            $stmt->bind_param("ssss", $nombre, $apellidos, $correo, $clave_segura);

            // execute ejecuta la inserción del registro
            if ($stmt->execute()) {
                echo "<p style='text-align:center; color:green;'>Usuario registrado correctamente.</p>";
                echo "<p style='text-align:center;'><a href='listar_usuarios.php'>Ver lista de usuarios</a></p>";
            } else {
                echo "<p style='text-align:center; color:red;'>Error al registrar el usuario.</p>";
            }

            // close cierra la consulta preparada
            $stmt->close();
        }

        // Cerrar la consulta de verificación
        $verificar->close();
    }

    // close cierra la conexión con la base de datos
    $conexion->close();
?>