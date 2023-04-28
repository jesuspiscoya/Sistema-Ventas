<?php
require '../services/producto_dao.php';

$productoDao = new ProductoDao;
if (isset($_POST['modificar'])) {
    $usuario = $productoDao->buscar($_POST['modificar']);
    echo json_encode($usuario);
}
if (isset($_POST['eliminar'])) {
    $eliminar = $productoDao->buscar($_POST['eliminar']);
    echo json_encode($eliminar);
}
?>