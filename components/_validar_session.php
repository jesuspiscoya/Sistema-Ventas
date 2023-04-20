<?php
if (!isset($_SESSION)) {
    session_start();
}
# Si no existe la sesion iniciada redirige
if (!isset($_SESSION["uid"])) {
    header("Location: " . $srcPage . "login.php");
    exit();
}
?>