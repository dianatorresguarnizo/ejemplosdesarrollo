<?php
    session_start();

    $_SESSION["visitas"] =
        ($_SESSION["visitas"] ?? 0) + 1;

    echo "Visitas: " . $_SESSION["visitas"];
