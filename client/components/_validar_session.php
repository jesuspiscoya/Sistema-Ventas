<?php
if (!isset($_SESSION)) {
    session_start();
}

$nombre = null;

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
}

if (isset($_SESSION['registro'])) {
    $mensaje = 'Usuario registrado con éxito.';
    $alert = 'success';
}

if (isset($_SESSION['pagar'])) {
    header('Location:' . $srcPage . 'login.php');
    exit();
}
?>