<?php
    session_start();

    $_SESSION['nombre'] = "Diana";
    $_SESSION['edad'] = 30;

    header("Location: ver.php");

    exit();


?>