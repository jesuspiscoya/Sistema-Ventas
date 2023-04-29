<?php
$src = '../';
require '../services/producto_dao.php';
$productoDao = new ProductoDao;

if (isset($_POST['modificar'])) {
    $producto = $productoDao->buscar($_POST['modificar']);
    echo json_encode($producto);
}
if (isset($_POST['eliminar'])) {
    $producto = $productoDao->buscar($_POST['eliminar']);
    echo json_encode($producto);
}
?>