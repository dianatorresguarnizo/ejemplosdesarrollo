<?php
    session_start();

    $_SESSION['nombre'] = "Diana";

    header("Location: ver.php");
    exit();

?>